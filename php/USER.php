
<?php

include 'DB.php';

class User extends Database {
    public $conn;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
    }




    public function login($Nickname, $Password)
    {
        $stmt = $this->conn->query('SELECT * FROM members WHERE Nickname = ?', [$Nickname]);
        $user = $stmt->fetch();

        if ($user && Password_verify($Password, $user['Password'])) {
            session_start();
            $_SESSION['user_id'] = $user['Nickname'];
            return true;
        }

        return false;
    }

    public function signup($nickname, $password, $email)
    {
        $stmt = $this->conn->query('SELECT * FROM members WHERE nickname = ? OR email = ?', [$nickname, $email]);
        $user = $stmt->fetch();
    
        if ($user) {
            return false;
        }
    
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $this->conn->query('INSERT INTO members (nickname, password, email) VALUES (?, ?, ?)', [$nickname, $hashedPassword, $email]);
    
        session_start();
        $_SESSION['user_id'] = $nickname;
    
        return true;
    }
    




    public function logout()
    {
        session_start();
        session_destroy();
    }

    public function isAuthenticated()
    {
        session_start();

        if (isset($_SESSION['user_id'])) {
            $stmt = $this->conn->query('SELECT * FROM members WHERE Nickname = ?', [$_SESSION['user_id']]);
            $user = $stmt->fetch();

            if ($user) {
                return true;
            }
        }

        return false;
    }

    public function getUser()
    {
        session_start();

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