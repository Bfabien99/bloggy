<?php
    class Database{
        private $db;

        public function __construct(){
            $this->db = new PDO("mysql:host=localhost:3306;dbname=bloggy;charset=utf8mb4","root", options:[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        public function query(string $query, array|null $params = []):array
        {
            $stmt = $this->db->prepare($query);
            return ['success' => $stmt->execute($params)];
        }

        public function fetch(string $query, array|null $params = []):array|string
        {

            if(!str_contains($query, 'SELECT')){
                return ['error' => 'SELECT statment must be in the query!'];
            }
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return ['success' => $stmt->fetch()];
        }

        public function fetchAll(string $query, array|null $params = []):array|string
        {
            if(!str_contains($query, 'SELECT')){
                return ['error' => 'SELECT statment must be in the query!'];
            }
            $stmt = $this->db->prepare($query);
            $stmt->execute($params);
            return ['success' => $stmt->fetchAll()];
        }
    }