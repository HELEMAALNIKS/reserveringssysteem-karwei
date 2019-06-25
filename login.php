<?php
//include the config.php file
require_once 'database/database.php';

//start the session
session_start();

//check if the form has been submitted
if (isset($_POST)) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //check if submitted username and password are correct
    $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    // if the login is correct, make a new session then redirect to index.php
    if ($count == 1){
        $_SESSION['username'] = $row['username'];
        if (isset($_SESSION['username'])){
            header ('Location: index.php');
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
<h1>Login</h1>
<form method="post" action="<?=$_SERVER['REQUEST_URI']; ?>">
    <div>
        <label for="email">E-Mail</label>
        <input id="email" type="email" name="email"/>
    </div>
    <div>
        <label for="password">Wachtwoord</label>
        <input id="password" type="password" name="password"/>
    </div>
    <div>
        <input type="submit" name="submit" value="Login"/>
    </div>
</form>
</body>
</html>
