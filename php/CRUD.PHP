<?php

class Crud {

    
    private $host = "localhost";
    private $db_name = "Library";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function read($table_name, $row ="*", $where="1 = 1") {
        $query = "SELECT $row FROM $table_name WHERE $where";
        $stmt = $this->conn->query($query);
        $xx = $stmt->fetchAll();
        return $xx;
    }

    public function create($table_name, $data) {
        $query = "INSERT INTO $table_name SET ";
        foreach($data as $key => $value) {
            $query .= "$key=:$key, ";
        }
        $query = rtrim($query, ", ");
        $stmt = $this->conn->prepare($query);
        foreach($data as $key => &$value) {
            $value = htmlspecialchars(strip_tags($value));
            $stmt->bindParam(":$key", $value);
        }
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update($table_name, $id, $data) {
        $query = "UPDATE $table_name SET ";
        foreach($data as $key => $value) {
            $query .= "$key=:$key, ";
        }
        $query = rtrim($query, ", ");
        $query .= " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(":id", $id);
        foreach($data as $key => &$value) {
            $value = htmlspecialchars(strip_tags($value));
            $stmt->bindParam(":$key", $value);
        }
        if($stmt->execute()) {
            return true;
        }
        return false;
    }



    public function delete($table_name, $id) {
        $query = "DELETE FROM $table_name WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(":id", $id);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function register($data) {
        $query = "INSERT INTO members SET username=:username, password=:password, email=:email, full_name=:full_name";
        $stmt = $this->conn->prepare($query);
        $data['username'] = htmlspecialchars(strip_tags($data['username']));
        $data['password'] = htmlspecialchars(strip_tags($data['password']));
        $data['email'] = htmlspecialchars(strip_tags($data['email']));
        $data['full_name'] = htmlspecialchars(strip_tags($data['full_name']));
        $hashed_password = password_hash($data['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(":username", $data['username']);
        $stmt->bindParam(":password", $hashed_password);
        $stmt->bindParam(":email", $data['email']);
        $stmt->bindParam(":full_name", $data['full_name']);
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

public function join($table1_name, $table2_name, $table1_id, $table2_id) {
    $query = "SELECT * FROM $table1_name INNER JOIN $table2_name ON $table1_name.$table1_id = $table2_name.$table2_id;";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}

















?>