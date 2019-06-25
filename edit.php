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
            </form>
        </div>
    </header>

    <div class="flex">
        <nav>
            <ul>
                <li><a class="active">Wijzig gegevens</a></li>
                <li><a>Bevestig wijziging</a></li>
            </ul>
        </nav>
        <article>
        <div class="reservation" id="reserveration">
        <div style="width: 33%; float: left">
            <form action="edit_confirmed.php" method="post">
                <label for="firstname">Voornaam:</label>
                <input class="text-box" type="text" name="firstname" value="<?=$firstname?>" required><br>
                <label for="lastname">Achternaam:</label>
                <input class="text-box" type="text" name="lastname" value="<?= $lastname?>" required><br>
                <label for="email">Email:</label>
                <input class="text-box" type="email" name="email" value="<?=$email?>" required><br>
                <label for="adress">Adres:</label>
                <input class="text-box" type="text" name="adress" value="<?=$adress?>" required><br>
                <label for="zipcode">Postcode:</label>
                <input class="text-box" type="text" name="zipcode" value="<?=$zipcode?>" required><br>
                <label for="city">Plaats:</label>
                <input class="text-box" type="text" name="city" value="<?=$city?>" required><br>
                <label for="phone">Telefoonnummer:</label>
                <input class="text-box" type="text" name="phone" value="<?=$phone?>" required><br>
        </div>
            <div style="width: 33%; margin: auto; display: inline-block;">
                <label for="drivers_license_number">Rijbewijsnummer:</label>
                <input class="text-box" type="number" name="drivers_license_number" value="<?=$drivers_license_number?>" required><br>
                <label for="license_plate">Kenteken:</label>
                <input class="text-box" type="text" maxlength="6" name="license_plate" value="<?=$license_plate?>" required><br>
                <label for="reservationdate">Reserveringsdatum:</label>
                <input class="text-box" type="date" name="reservationdate" value="<?=$reservationdate?>" required><br>
                <label for="starttime">Starttijd:</label>
                <input class="text-box" type="text" name="starttime" value="<?=$starttime?>" required><br>
                <label for="endtime">Eindtijd:</label>
                <input class="text-box" type="text" name="endtime" value="<?=$endtime?>" required><br>
                <label for="trailertype">Aanhanger:</label>
                <input class="text-box" type="text" name="trailertype" value="<?=$trailertype?>" required><br>
            </div>
            <div style="width: 33%; float: right;">
                <form action="edit_confirmed.php" method="post">
                <label for="net">Net:</label>
                <input class="text-box" type="text" name="net" value="<?=$net?>"><br>
                <label for="adapter">Adapter:</label>
                <input class="text-box" type="text" name="adapter" value="<?=$adapter?>"><br>
                <label for="straps">Spanbanden:</label>
                <input class="text-box" type="text" name="straps" value="<?=$straps?>"><br>
                <input class="text-box" type="hidden" name="id" value="<?=$id?>"><br>
                <input class="text-box" type="submit" name="submit" value="Verzenden">
                </form>
            </div>
            </div>
            </div>
        </article>
</div>
</div>
<footer>Copyright &copy; 2019 Jaron Hoste</footer>
</body>

</html>