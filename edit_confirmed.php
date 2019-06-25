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


$id = mysqli_real_escape_string($db, $_POST['id']);

$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$adress = mysqli_real_escape_string($db, $_POST['adress']);
$zipcode = mysqli_real_escape_string($db, $_POST['zipcode']);
$city = mysqli_real_escape_string($db, $_POST['city']);
$phone = mysqli_real_escape_string($db, $_POST['phone']);
$drivers_license_number = mysqli_real_escape_string($db, $_POST['drivers_license_number']);
$license_plate = mysqli_real_escape_string($db, $_POST['license_plate']);
$reservationdate = mysqli_real_escape_string($db, $_POST['reservationdate']);
$starttime = mysqli_real_escape_string($db, $_POST['starttime']);
$endtime = mysqli_real_escape_string($db, $_POST['endtime']);
$trailertype = mysqli_real_escape_string($db, $_POST['trailertype']);
$net = mysqli_real_escape_string($db, $_POST['net']);
$adapter = mysqli_real_escape_string($db, $_POST['adapter']);
$straps = mysqli_real_escape_string($db, $_POST['straps']);

$update_query = "UPDATE reservations SET    firstname = '$firstname',
                                            lastname = '$lastname',
                                            email = '$email',
                                            adress = '$adress',
                                            zipcode = '$zipcode',
                                            city = '$city',
                                            phone = '$phone',
                                            drivers_license_number = '$drivers_license_number',
                                            license_plate = '$license_plate',
                                            reservationdate = '$reservationdate',
                                            starttime = '$starttime',
                                            endtime = '$endtime',
                                            trailertype = '$trailertype',
                                            net = '$net',
                                            adapter = '$adapter',
                                            straps = '$straps'
                                WHERE id = $id";

if (isset($_POST['submit'])) {
    $update = mysqli_query($db, $update_query)
        or die ('Error ' . mysqli_error($db) . '<br> Query:' . $update_query);
}
else {
    echo "something didn't go right";
}
header("Location: secure.php");

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
    </div>
</div>
<footer>Copyright &copy; 2019 Jaron Hoste</footer>
</body>

</html