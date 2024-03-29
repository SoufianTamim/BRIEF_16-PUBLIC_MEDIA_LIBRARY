
<?php
require __DIR__.'/../vendor/autoload.php';

include 'DB.php';
include 'CRUD.php';

class User  extends Database {
    public $conn;

    public function __construct()
    {
        $this->conn = self::$db_sub;
        session_start();
    }




    public function login($Nickname, $Password)
    {
        $stmt = $this->conn->prepare('SELECT * FROM Members WHERE Nickname = ?');
        $stmt->execute([$Nickname]);
        $user = $stmt->fetch();

        if ($user && password_verify($Password, $user['Password'])) {
            $_SESSION['user_id'] = $user['Nickname'];
            $_SESSION['Penalties'] = $user['Penalty_Count'];
            return true;
        }

        return false;
    }


    public function signup($nickname, $name, $CIN, $Occupation, $email, $Phone, $Address, $BirthDate, $password)
    {
        $user = $this->conn->query("SELECT * FROM members WHERE Nickname = '$nickname' OR Email = '$email'")->fetch();

        if ($user) {
            return false;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->conn->query("INSERT INTO members (`Nickname`, `Full_Name`, `CIN`, `Occupation`, `Email`, `Phone`, `Address`, `Birth_Date`, `Password`) 
                            VALUES ('$nickname', '$name', '$CIN', '$Occupation', '$email', '$Phone', '$Address', '$BirthDate', '$hashedPassword')");
        

        // session_start();
        $_SESSION['user_id'] = $nickname;

        return true;
    }
    
    public function logout()
    {
        // session_start();
        session_destroy();
    }

    public function isAuthenticated()
{
    // session_start();

    if (isset($_SESSION['user_id'])) {
        $stmt = $this->conn->prepare('SELECT * FROM members WHERE Nickname = ?');
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();

        if ($user) {
            return true;
        }
    }

    return false;
}
    public function isAdmin()
{
    // session_start();

    if (isset($_SESSION['user_id'])) {
        $stmt = $this->conn->prepare('SELECT * FROM members WHERE Nickname = ?');
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();

        if ($user && $user['Admin'] == 1) {
            return true;
        }
    }

    return false;
}


    public function getUser()
    {

        if (isset($_SESSION['user_id'])) {
            
            $stmt = $this->conn->prepare('SELECT * FROM members WHERE Nickname = ?');
            $stmt->execute([$_SESSION['user_id']]);
            $user = $stmt->fetch();

            if ($user) {
                return $user;
            }
        }

        return null;
    }

    public function getPenalties($nickname) {

        $stmt = $this->conn->prepare("SELECT Penalty_Count FROM members WHERE Nickname = :nickname");

        $stmt->bindParam(':nickname', $nickname);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['Penalty_Count'];
    }
}



?>