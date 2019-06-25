<?php
require_once "database/database.php";
session_start();

//Mag ik hier uberhaupt komen???
if (!isset($_SESSION['login'])){    // checkt of er een sessie in werking is
    header("Location: index.php");
    exit;
}

//Haal email op uit sessie
$email = $_SESSION['login'];


$id = mysqli_real_escape_string($db, $_POST['reservation']);

$select = "SELECT * FROM reservations WHERE id = $id";

$results = mysqli_query($db, $select);
$row = $results ->fetch_assoc();

$firstname = htmlentities($row['firstname']);
$lastname = htmlentities($row['lastname']);
$email = htmlentities($row['email']);
$adress = htmlentities($row['adress']);
$zipcode = htmlentities($row['zipcode']);
$city = htmlentities($row['city']);
$phone = htmlentities($row['phone']);
$drivers_license_number = htmlentities($row['drivers_license_number']);
$license_plate = htmlentities($row['license_plate']);
$reservationdate = htmlentities($row['reservationdate']);
$starttime = htmlentities($row['starttime']);
$endtime = htmlentities($row['endtime']);
$trailertype = htmlentities($row['trailertype']);
$net = htmlentities($row['net']);
$adapter = htmlentities($row['adapter']);
$straps = htmlentities($row['straps']);

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
        </div>
    </header>

    <div class="flex" style="justify-content: center">
        <div class="flexcenter" style="text-align: center">
        <div class="flexbutton">
        <h1>Weet je zeker dat je het wilt verwijderden?</h1>
            <form action="delete_confirmed.php" method="post">
                <input type="hidden" name="reservation" value="<?=$id?>">
                <input type="submit" name="submit" value="Ja">
                <input type="button" value="Nee" onclick="window.location.href='secure.php'" />
            </form>
        </div>
    </div>
    </div>

</div>
<footer>Copyright &copy; 2019 Jaron Hoste</footer>
</body>

</html>