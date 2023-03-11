<?php
require __DIR__ . '/../vendor/autoload.php';

class Crud extends Database
{
    public $conn;

    public function __construct()
    {
        $this->conn = self::$gogo;
    }

    public function readQuery($query)
    {
        $stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function read($table_name, $where = "1 = 1", $row = "*")
    {
        $query = "SELECT $row FROM $table_name WHERE $where";
        $stmt = $this->conn->query($query);
        $xx = $stmt->fetchAll();
        // dd($xx);
        return $xx;
    }

    public function create($table_name, $data)
    {
        $keys = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), '?'));

        $query = "INSERT INTO $table_name ($keys) VALUES ($placeholders)";
        $stmt = $this->conn->prepare($query);

        $values = array_values($data);

        $success = $stmt->execute($values);

        if ($success) {
            return $this->conn->lastInsertId();
        } else {
            return false;
        }
    }

    public function update($table_name, $Nickname, $id_Name, $data)
    {
        $query = "UPDATE $table_name SET ";
        foreach ($data as $key => $value) {
            $query .= "$key = :$key, ";
        }
        $query = rtrim($query, ", ");
        $query .= " WHERE $id_Name=:Nickname";
        $stmt = $this->conn->prepare($query);
        $Nickname = htmlspecialchars(strip_tags($Nickname));
        $stmt->bindParam(":Nickname", $Nickname);
        foreach ($data as $key => &$value) {
            $value = htmlspecialchars(strip_tags($value));
            $stmt->bindParam(":$key", $value);
        }
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete($table_name, $column, $id)
    {
        $query = "DELETE FROM $table_name WHERE $column=:id";
        $stmt = $this->conn->prepare($query);
        $id = htmlspecialchars(strip_tags($id));
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function join($table1_name, $table2_name, $table1_id, $table2_id)
    {
        $query = "SELECT * FROM $table1_name INNER JOIN $table2_name ON $table1_name.$table1_id = $table2_name.$table1_id;";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function filterItems($title = '', $authorName = '', $categoryName = '') {
        $conditions = array();
        $parameters = array();
        if (!empty($title)) {
            $conditions[] = 'i.Title LIKE ?';
            $parameters[] = "%$title%";
        }
        if (!empty($authorName)) {
            $conditions[] = 'a.Author_Name LIKE ?';
            $parameters[] = "%$authorName%";
        }
        if (!empty($categoryName)) {
            $conditions[] = 'c.Category_Name LIKE ?';
            $parameters[] = "%$categoryName%";
        }
        $whereClause = '';
        if (!empty($conditions)) {
            $whereClause = 'WHERE ' . implode(' AND ', $conditions);
        }
        $stmt = $this->conn->prepare("SELECT *, i.Item_Code, i.Title, i.Author_Name, c.Category_Name
                            FROM item i
                            JOIN category c ON i.Category_Code = c.Category_Code
                            WHERE i.Title LIKE ?
                              AND i.Author_Name LIKE ?
                              AND c.Category_Name LIKE ?");
        $stmt->execute(["%$title%", "%$authorName%", "%$categoryName%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function filter($col_1 = '', $col_2 = '', $col_3 = '', $table_1, $table_2, $val_1 = '', $val_2 = '', $val_3 = '')
    {
        $conditions = array();
        $parameters = array();
        if (!empty($val_1)) {
            $conditions[] = 'i.' . $col_1 . 'LIKE ?';
            $parameters[] = "%$val_1%";
        }
        if (!empty($val_2)) {
            $conditions[] = 'a.' . $col_2 . ' LIKE ?';
            $parameters[] = "%$val_2%";
        }
        if (!empty($val_3)) {
            $conditions[] = 'a.' . $col_3 . ' LIKE ?';
            $parameters[] = "%$val_3%";
        }
        $whereClause = '';
        if (!empty($conditions)) {
            $whereClause = 'WHERE ' . implode(' AND ', $conditions);
        }
        $stmt = $this->conn->prepare("SELECT * FROM $table_2 i  JOIN $table_1 c ON i.Item_Code = c.Item_Code   WHERE c.$col_1 LIKE ?  AND c.$col_2 LIKE ? AND i.$col_3 LIKE ?");
        $stmt->execute(["%$val_1%", "%$val_2%", "%$val_3%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>