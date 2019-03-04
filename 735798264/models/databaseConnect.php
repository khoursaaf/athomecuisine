<?php
class database {
    public $db;
    
    public function __construct() {
        $this->db = new PDO('mysql:dbname=athomecuisine;host=localhost', 'khoursaaf', 'khoursa123', [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);        
    }
}