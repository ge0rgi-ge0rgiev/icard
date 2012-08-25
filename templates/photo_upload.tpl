<h2>Photo Upload</h2>
{$message}
<form acrtion="photo_upload.php" method="POST" enctype="multipart/form-data">
    <!-- Max upload filesize - 1MB -->
    <input type="hidden" name="MAX_FILE_SIZE" value="{$max_file_size}" />
    <label for="title" >Title:</label>
    <br />
    <input type="text" id="title" name="title" /></p>
    <input type="file" name="image" /></p>
    <label for="description" >Description:</label>
    <br />
    <textarea name="description" id="description" rows="5" cols="20" ></textarea></p>
    <input type="submit" value="Upload" name="submit" />
</form>