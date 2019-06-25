<?php
session_start();
//Check if post isset
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == "" || $password == ""){
        $error = "Vul beide gegevens in";
    } elseif($email != "test" || $password != "test") {
        $error = "Combinatie gebruikersnaam/wachtwoord onjuist";
    }
    if (!isset($error)) {
        $_SESSION['login'] = $email;
    }
}

//Ben in ingelogd?
if (isset($_SESSION['login'])){    // checkt of er een sessie in werking is
    header("Location: secure.php");
    exit;
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
