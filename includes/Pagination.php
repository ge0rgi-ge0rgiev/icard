<?php


class Pagination {
    
    private $current_page;
    private $per_page;
    private $total_count;
    
    public function __construct($page = 1, $per_page = 3, $total_count) {
        $this->current_page = (int)$page;
        $this->per_page = (int)$per_page;
        $this->total_count = (int)$total_count;
    }
    
    public function total_pages() {
        return ceil($this->total_count / $this->per_page);
    }
    
    public function offset() {
        return ($this->current_page - 1) * $this->per_page;
    }
    
    public function has_next_page() {
        return ($this->current_page < $this->total_pages()) ? true : false;
    }
    
    public function has_previous_page() {
        return ($this->current_page > 1) ? true : false;
    }
    
    public function next_page() {
        return $this->current_page + 1;
    }
    
    public function previous_page() {
        return $this->current_page - 1;
    }
    
}