<?php

require 'User.php';

$conn = new Database('localhost', 'Library', 'root', '');
$user = new User($conn);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Nickname']) && isset($_POST['password'])) {
    $Nickname = $_POST['Nickname'];
    $password = $_POST['password'];

    if ($user->login($Nickname, $password)) {
        header('Location: ../pages/home.php');
        exit;
    } else {
        $error = 'Invalid Nickname or password';
    }
} 

if (isset($_GET['logout'])) {
    $user->logout();
    header('Location: index.php'); 
    exit;
}

$isAuthenticated = $user->isAuthenticated();
$userData = $isAuthenticated ? $user->getUser() : null;


?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Example</title>
</head>
<body>
    <?php if ($isAuthenticated) : ?>
        <p>Welcome, <?= $userData['Nickname'] ?>!</p>
        <a href="?logout">Logout</a>
    <?php else : ?>
        <form method="post">
            <label>Nickname:</label>
            <input type="text" name="Nickname"><br>
            <label>Password:</label>
            <input type="password" name="password"><br>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error)) : ?>
            <p><?= $error ?></p>
        <?php endif ?>
    <?php endif ?>
</body>
</html>