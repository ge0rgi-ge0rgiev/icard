<?php

require_once 'DatabaseObject.php';

class Photograph extends DatabaseObject {

    protected static $table_name = 'pictures';
    protected static $db_fields = array('id', 'filename', 'title', 'description', 'created');
    
    public $id;
    public $filename;
    public $title;
    public $description;
    public $created;
    
    private $temp_path;
    private $type;
    private $size;
    
    public $upload_dir = 'images';
    public $error = array();
    
    protected $upload_errors = array(
        UPLOAD_ERR_OK => "No errors.",
        UPLOAD_ERR_INI_SIZE => "Larger than upload_max_filesize.",
        UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE.",
        UPLOAD_ERR_PARTIAL => "Partial upload.",
        UPLOAD_ERR_NO_FILE => "No file.",
        UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
        UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
        UPLOAD_ERR_EXTENSION => "File upload stopped by extension."
    );

    public function image_path() {
        return $this->upload_dir.DS.$this->filename;
    }
    
    public function thumb_path() {
        return $this->upload_dir.DS .'thumb_'.$this->filename;
    }
    
    public function size_as_text() {
        if ($this->size < 1024) {
            return "{$this->size} bytes";
        } elseif ($this->size < 1048576) {
            $size_kb = round($this->size / 1024);
            return "{$size_kb} KB";
        } else {
            $size_mb = round($this->size / 1048576, 1);
            return "{$size_mb} MB";
        }
    }

    public function attach_file($file) {
        if (!$file || empty($file) || !is_array($file)) {
            $this->errors[] = 'No file was uploaded.';

            return false;
        } else if ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors[$file['error']];

            return false;
        } else {
            $this->temp_path = $file['tmp_name'];
            $this->filename = basename($file['name']);
            $this->type = $file['type'];
            $this->size = $file['size'];

            return true;
        }
    }

    public function save() {

        if (isset($this->id)) {
            $this->create();
        } else {

            if (!empty($this->errors)) {
                //$this->errors[] = 'First error.';
                return false;
            }

            if ($this->type != 'image/jpeg' && $this->type != 'image/png' && $this->type != 'image/gif') {
                $this->errors[] = 'The file is not a known image format.';
                return false;
            }

            if (empty($this->filename) || empty($this->temp_path)) {
                $this->errors[] = 'The file locaton was not available';
                return false;
            }

            $target_path = SITE_ROOT.DS.$this->upload_dir.DS.$this->filename;

            if (file_exists($target_path)) {
                $this->errors[] = "The file {$this->filename} already exists";
                return false;
            }

            if (move_uploaded_file($this->temp_path, $target_path)) {
                if ($this->create() && $this->generate_thumbnail($target_path, 150, 150, $this->upload_dir)) {
                    unset($this->temp_path);
                    return true;
                }
            } else {
                $this->errors[] = 'The file upload failed, possibly due to incorrect permissions on the upload folder.';
                return false;
            }
        }
    }

    private function generate_thumbnail($path, $width = 150, $height = 150, $destination = '.') {

        // just get the filename
        $image_file = basename($path);
        // full given image path
        $image = $path;

        // if the image exists continue ..
        if (file_exists($image)) {
            // get the image dimensions and file type in array
            $source_size = getimagesize($image);

            // wanted dimensions
            $thumb_width = $width;
            $thumb_height = $height;

            switch ($source_size['mime']) {
                case 'image/jpeg':
                    $source = imagecreatefromjpeg($image);
                    break;
                case 'image/png':
                    $source = imagecreatefrompng($image);
                    break;
                case 'image/gif':
                    $source = imagecreatefromgif($image);
                    break;
            }


            $source_aspect = round(($source_size[0] / $source_size[1]), 1);
            $thumb_aspect = round(($thumb_width / $thumb_height), 1);

            // if the image is narrow
            if ($source_aspect < $thumb_aspect) {
                $new_size = array($thumb_width, ($thumb_width / $source_size[0]) * $source_size[1]);
                $source_pos = array(0, ($new_size[1] - $thumb_height) / 2);
                // if the image is wide
            } else if ($source_aspect > $thumb_aspect) {
                $new_size = array(($thumb_width / $source_size[1]) * $source_size[0], $thumb_height);
                $source_pos = array(($new_size[0] - $thumb_width) / 2, 0);
                // same shape
            } else {
                $new_size = array($thumb_width, $thumb_height);
                $source_pos = array(0, 0);
            }

            $new_size[0] = max($new_size[0], 1);
            $new_size[1] = max($new_size[1], 1);

            // Copy and resize original image.
            $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
            imagecopyresampled($thumb, $source, 0, 0, $source_pos[0], $source_pos[1], $new_size[0], $new_size[1], $source_size[0], $source_size[1]);

            // Create thumbnail image according to original image type
            switch ($source_size['mime']) {

                case 'image/jpeg':
                    imagejpeg($thumb, $destination . DIRECTORY_SEPARATOR . 'thumb_' . $image_file);
                    break;
                case 'image/png':
                    imagepng($thumb, $destination . DIRECTORY_SEPARATOR . 'thumb_' . $image_file);
                    break;
                case 'image/gif':
                    imagegif($thumb, $destination . DIRECTORY_SEPARATOR . 'thumb_' . $image_file);
                    break;
            }
            // finally return true
            return true;
        } else {
            // if the file doesn`t exists
            return false;
        }
    }
    
    
    public function destroy() {
        if ($this->delete()) {
            $target_path = SITE_ROOT . DS . $this->image_path();
            return unlink($target_path) ? true : false;
        } else {
            return false;
        }
    }

}