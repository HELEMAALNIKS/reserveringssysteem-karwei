<?php
require('database/database.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$adress = $_POST['adress'];
$zipcode = $_POST['zipcode'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$license_plate = $_POST['license_plate'];
$drivers_license_number = $_POST['drivers_license_number'];
$reservationdate = $_POST['reservationdate'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];
$upstream = "INSERT INTO reservations (firstname, lastname, email, adress, zipcode, city, phone, license_plate, drivers_license_number, reservationdate, starttime, endtime) 
VALUES ('$firstname', '$lastname', '$email','$adress', '$zipcode', '$city', '$phone', '$license_plate', '$drivers_license_number', '$reservationdate', '$starttime', '$endtime')";
$upstreamexecute = mysqli_query($db, $upstream)
or die("Error: " . mysqli_error($db) . '<br> Query:' . $upstream);

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
                <form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>" style="">
                    <div class="loginform">
                        <label for="email">E-Mail</label>
                        <input id="email" type="email" name="email"/>
                    </div>
                    <div class="loginform">
                        <label for="password">Wachtwoord</label>
                        <input id="password" type="password" name="password"/>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Login"/>
                    </div>
            </div>
            </form>
        </div>
    </header>
</div>
<div class="flex">
    <nav>
        <ul>
            <li><a>Vul gegevens in</a></li>
            <li><a class="active">Bevestig reservering</a></li>
            <li><a>Aanhanger ophalen</a></li>
        </ul>
    </nav>
</div>
<footer>Copyright &copy; 2019 Jaron Hoste</footer>
</body>

</html>
