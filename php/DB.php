<?php

class Database {
    public  static $host;
    public static $db_name;
    public static $username;
    public  static $password;
    // public  static $conn;
    public static $db_sub;

     public  static function connect($host, $db_name, $username, $password) {
        self::$host = $host;
        self::$db_name = $db_name;
        self::$username = $username;
        self::$password = $password;

        try {
            $lol = new PDO("mysql:host=".self::$host.";dbname=".self::$db_name, self::$username, self::$password);
            self::$db_sub = $lol ;

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    // public static function getConnection() { 
    //     dump(self::$db_sub);
    //     $stmt = self::$db_sub->exec("INSERT INTO members (CIN, Nickname, Email) VALUES ('mmmmmmmm', 'mmmmmmmm', 'mmmmmmmmmmm')");
    // }

    public function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
 ?>