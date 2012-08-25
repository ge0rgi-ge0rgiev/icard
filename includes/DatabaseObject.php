<?php

require_once 'Database.php';

class DatabaseObject {
    
    public static function where($field, $value) {
        $where = (isset($field) && isset($value)) ? "WHERE {$field} like '{$value}%' " : '';
        return $where;
    }
    
    public static function order_by() {
        $field = (isset($_GET['sort'])) ? $_GET['sort'] : 'id';
        $order = (isset($_GET['order'])) ? $_GET['order'] : 'ASC';
        $order_by = array("ORDER BY {$field} {$order} ", $field, $order);
        
        return $order_by;
    }


    public static function count_all($where = '') {
        global $db;
        $sql = "SELECT COUNT(*) FROM ".static::$table_name." {$where} ";
        $result = $db->query($sql);
        $row = $db->fetch_array($result);
        return array_shift($row);
    }
    
    public static function find_by_sql($sql) {
        global $db;
        $object_array = array();
        
        $result = $db->query($sql);
        while($row = $db->fetch_array($result)) {
            $object_array[] = static::instantiate($row);
        }
        return $object_array;
    }
    
    public static function find_by_id($id) {
        global $db;
        $id = $db->escape_value($id);
        $found_user = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id = {$id} ");
        return ($found_user) ? array_shift($found_user) : false;
    }
    
    public static function find_all() {
        return static::find_by_sql("SELECT * FROM " . static::$table_name);
    }
    
    private static function instantiate($record) {
        $class = get_called_class();
        $object = new $class;
        
        foreach ($record as $attribute => $value) {
            if($object->has_attribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }
    
    private function has_attribute($attribute) {
        return array_key_exists($attribute, $this->attributes());
    }
    
    private function attributes() {
        $attributes = array();
        
        foreach (static::$db_fields as $field) {
            if(property_exists($this, $field)) {
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }
    
    private function sanitized_attributes() {
        global $db;
        $attributes = $this->attributes();
        $cleaned_attributes = array();
        
        foreach ($attributes as $key => $value) {
            $cleaned_attributes[$key] = $db->escape_value($value);
        }
        return $cleaned_attributes;
    }
    
    protected function create() {
        global $db;
        $attributes = $this->sanitized_attributes();
        
        $sql = "INSERT INTO ".static::$table_name." ";
        $sql .= "(" . join(', ', array_keys($attributes)) . ") ";
        $sql .= "VALUES('" . join("', '", array_values($attributes)) . "')";
        
        $db->query($sql);
        
        if($db->affected_rows() == 1){ 
            $this->id = $db->insert_id();
            return true;
        }
        else {
            return false;
        }
    }
    
    protected function update() {
        global $db;
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key} = '{$value}'";
        }
        
        $sql = "UPDATE ".static::$table_name." SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .= " WHERE id = " . $this->id;
        
        $db->query($sql);
        return ($db->affected_rows() == 1) ? true : false;
    }
    
    public function save() {
        return (isset($this->id)) ? $this->update() : $this->create();
    }
    
    public function delete() {
        global $db;
        
        $sql = "DELETE FROM " . static::$table_name;
        $sql .= " WHERE id = " . $this->id;
        
        $db->query($sql);
        return ($db->affected_rows() == 1) ? true : false;
    }
}