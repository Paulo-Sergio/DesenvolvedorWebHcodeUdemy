<?php

class Sql {

    public $conn;

    public function __construct() {
        $this->conn = new PDO('mysql:host=localhost;dbname=hcode_shop;charset=utf8', "root", "");
    }

    public function query($string_query) {
        
        return $this->conn->query($string_query, PDO::FETCH_ASSOC);
    }

}
