<?php
require('database/database.php');
session_start();
//Chek if post isset
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == "" || $password == ""){
        $error = "Vul beide gegevens in";
    } elseif($email != "robert@karwei.nl" || $password != "test") {
        $error = "Combinatie gebruikersnaam/wachtwoord onjuist";
    }
    if (!isset($error)) {
        $_SESSION['login'] = $email;
    }
}

//Ben in ingelogd?
if (isset($_SESSION['login'])) {    // checkt of er een sessie in werking is
    header("Location: secure.php");
    exit;
}

//wachtwoord inplementatie
$tbl_name="admins"; // Table name

?>

<!doctype html>
<html lang="en">
<head>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Reservering</title>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="subheader">
            <div class="center"></div>
        </div>
    </div>
    <header style="position: relative">
        <div style="height: 50px;position: relative;">
            <h1>Aanhangwagens Karwei Krimpen</h1>
            <div class="left">
                <a href="index.php"> <img src="files/karwei-logo.png" alt="Karwei Logo"
                                          style="width:110px;height:84px;"> </a>
            </div>
<!--            <div class="right">-->
<!--                <form method="post" action="--><?//= $_SERVER['REQUEST_URI']; ?><!--" style="">-->
<!--                    <div class="loginform">-->
<!--                        <label for="email">E-Mail</label>-->
<!--                        <input id="email" type="email" name="email"/>-->
<!--                    </div>-->
<!--                    <div class="loginform">-->
<!--                        <label for="password">Wachtwoord</label>-->
<!--                        <input id="password" type="password" name="password"/>-->
<!--                    </div>-->
<!--                    <div>-->
<!--                        <input type="submit" name="submit" value="Login"/>-->
<!--                    </div>-->
<!--            </div>-->
            </form>
        </div>
    </header>
</div>
<div class="flex">
    <nav>
        <ul>
            <li><a>Vul gegevens in</a></li>
            <li><a>Bevestig reservering</a></li>
            <li><a class="active">Aanhanger ophalen</a></li>
        </ul>
    </nav>
    <article>
        <div style="width: 50%; float: left;">
            <h1>Het reserveren is gelukt!</h1>
            U kunt de aanhanger op de afgesproken datum en tijd<br>
            ophalen bij Karwei Krimpen aan den IJssel.
        </div>
        <div style="width: 50%; float: right">
            <div style="width: 100%">
                <iframe width="100%" height="320px"
                        src="https://maps.google.com/maps?width=100%&height=600&hl=nl&q=Karwei%20Krimpen%20aan%20den%20IJssel+(Karwei%20Krimpen%20aan%20den%20IJssel)&ie=UTF8&t=&z=14&iwloc=B&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a
                            href="https://www.mapsdirections.info/nl/maak-een-google-map/">Maak een Google Map</a> van
                    <a href="https://www.mapsdirections.info/nl/">Nederland Kaart</a></iframe>
            </div>
            <br/>
        </div>
</div>

</article>
</div>
<footer>Copyright &copy; 2019 Jaron Hoste</footer>
</body>

</html>
