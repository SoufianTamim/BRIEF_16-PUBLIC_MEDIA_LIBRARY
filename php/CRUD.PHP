<?php

require __DIR__.'/../vendor/autoload.php';

// include 'DB.php';

class Crud extends Database {
    public $conn;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
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

    public function join($table1_name, $table2_name, $table1_id, $table2_id) {
        $query = "SELECT * FROM $table1_name INNER JOIN $table2_name ON $table1_name.$table1_id = $table2_name.$table2_id;";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function filterItems($table_name ,$Column_1 = null, $Column_2 = null, $Column_3 = null) {
        $Column_1 = $this->conn->quote("%" . $Column_1 . "%");
        $Column_2 = $this->conn->quote("%" . $Column_2 . "%");
        $Column_3 = $this->conn->quote($Column_3);
    
        $sql = "SELECT * FROM item INNER JOIN category ON item.Category_Code = category.Category_Code where 1 = 1";

        if($Column_1 != null) {
            $sql .= " AND Title LIKE " . $Column_1;
        }
    
        if($Column_2 != null) {
            $sql .= " AND Author_Name LIKE " . $Column_2;
        }
    
        if($Column_3 != null) {
            $sql .= " AND Category_Name = " . $Column_3;
        }
    

        $result = $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            echo "<pre class='bg-dark'>";
            echo $sql;
            print_r($result);
            echo "</pre>";



        return $result;
    }
}

?>