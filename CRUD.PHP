<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "mydatabase";
    private $pdo;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->database}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
    }

    public function getPdo() {
        return $this->pdo;
    }
}





class Crud {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function select($table, $columns = "*", $where = "") {
        $pdo = $this->db->getPdo();
        $query = "SELECT {$columns} FROM {$table}";
        if (!empty($where)) {
            $query .= " WHERE {$where}";
        }
        $stmt = $pdo->query($query);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function read($table, $id) {
        $pdo = $this->db->getPdo();
        $query = "SELECT * FROM {$table} WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function update($table, $id, $data) {
        $pdo = $this->db->getPdo();
        $set = '';
        foreach ($data as $key => $value) {
            $set .= "{$key}=:{$key},";
        }
        $set = rtrim($set, ',');
        $query = "UPDATE {$table} SET {$set} WHERE id=:id";
        $stmt = $pdo->prepare($query);
        $data['id'] = $id;
        $stmt->execute($data);
        $result = $stmt->rowCount();
        return $result;
    }

    public function delete($table, $id) {
        $pdo = $this->db->getPdo();
        $query = "DELETE FROM {$table} WHERE id=:id";
        $stmt = $pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $result = $stmt->rowCount();
        return $result;
    }
}





$crud = new Crud();

// Select data
$result = $crud->select('users', 'id, name, email', 'age > 25');
foreach ($result as $row) {
    echo "{$row['id']}: {$row['name']} ({$row['email']})<br>";
}

// Read data
$user = $crud->read('users', 1);
echo "Name: {$user
