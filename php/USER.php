
<?php
require __DIR__.'/../vendor/autoload.php';
// dd("haa");


include 'DB.php';
include 'CRUD.php';


class User extends Database {
    public $conn;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
        session_start();
    }




    public function login($Nickname, $Password)
    {
        $stmt = $this->conn->query('SELECT * FROM members WHERE Nickname = ?', [$Nickname]);
        $user = $stmt->fetch();

        if ($user && Password_verify($Password, $user['Password'])) {
            // session_start();
            $_SESSION['user_id'] = $user['Nickname'];
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
        

        session_start();
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
            $stmt = $this->conn->query('SELECT * FROM members WHERE Nickname = ?', [$_SESSION['user_id']]);
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
        $stmt = $this->conn->query('SELECT admin FROM members WHERE Nickname = ?', [$_SESSION['user_id']]);
        $result = $stmt->fetch();

        if ($result && $result['admin'] == 1) {

            // dd($result);
            return true;
        }
    }

    return false;
}


    public function getUser()
    {
        // session_start(); 

        if (isset($_SESSION['user_id'])) {
            $stmt = $this->conn->query('SELECT * FROM members WHERE Nickname = ?', [$_SESSION['user_id']]);
            $user = $stmt->fetch();

            if ($user) {
                return $user;
            }
        }

        return null;
    }
}



?>