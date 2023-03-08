<?php

class Database {
    public  static $host;
    public static $db_name;
    public static $username;
    public  static $password;
    // public  static $conn;
    public static $gogo;

     public  static function connect($host, $db_name, $username, $password) {
        self::$host = $host;
        self::$db_name = $db_name;
        self::$username = $username;
        self::$password = $password;

        try {
            $lol = new PDO("mysql:host=".self::$host.";dbname=".self::$db_name, self::$username, self::$password);
        // $stmt = $lol->exec("INSERT INTO members (CIN, Nickname, Email) VALUES ('pppp', 'ppp', 'ppppp')");
// dd($stmt);
self::$gogo = $lol ;

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public static function getConnection() {
        
        dump(self::$gogo);
        
        $stmt = self::$gogo->exec("INSERT INTO members (CIN, Nickname, Email) VALUES ('mmmmmmmm', 'mmmmmmmm', 'mmmmmmmmmmm')");
//   $stmt->bindParam(':CIN', $CIN);
//   $stmt->bindParam(':Nickname', $Nickname);
//   $stmt->bindParam(':Email', $Email);
  
  // insert a row
//   $CIN = "John";
//   $Nickname = "Doe";
//   $Email = "john@example.com";
//   $xd = $stmt->execute();
  
  dd( $stmt );
//   return $xd ;
//   return $this->conn;

    }

    public function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
 ?>