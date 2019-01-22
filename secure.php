<?php
session_start();

//Mag ik hier uberhaupt komen???
if (!isset($_SESSION['login'])){    // checkt of er een sessie in werking is
    header("Location: index.php");
    exit;
}

//Haal email op uit sessie
$email = $_SESSION['login'];
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
                <a href="index.php"> <img src="files/karwei-logo.png" alt="Karwei Logo" style="width:110px;height:84px;"> </a>
            </div>
            <div class="right">
                Je bent nu ingelogd als <br>
                <?= $email; ?><br>
                <form>
                    <input type="button" value="Uitloggen" onclick="window.location.href='logout.php'" />
                </form>
            </div>
            </form>
        </div>
    </header>
</div>
<footer>Copyright &copy; 2019 Jaron Hoste</footer>
</body>

</html>

