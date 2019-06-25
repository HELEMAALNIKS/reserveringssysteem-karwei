<?php
require('database/database.php');
session_start();
//Chek if post isset
//if (isset($_POST['submit'])) {
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//
//    if($email == "" || $password == ""){
//        $error = "Vul beide gegevens in";
//    } elseif($email != "robert@karwei.nl" || $password != "test") {
//        $error = "Combinatie gebruikersnaam/wachtwoord onjuist";
//    }
//    if (!isset($error)) {
//        $_SESSION['login'] = $email;
//    }
//}

//Ben in ingelogd?
if (isset($_SESSION['login'])) {    // checkt of er een sessie in werking is
    header("Location: secure.php");
    exit;
}
$adapter = 0;
$net = 0;
$straps = 0;


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$adress = $_POST['adress'];
$zipcode = $_POST['zipcode'];
$city = $_POST['city'];
$phone = $_POST['phone'];
$trailertype = $_POST['trailertype'];
$straps = $_POST['straps'];
$net = $_POST['net'];
$adapter = $_POST['adapter'];
$license_plate = $_POST['license_plate'];
$drivers_license_number = $_POST['drivers_license_number'];
$reservationdate = $_POST['reservationdate'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];
$upstream = "INSERT INTO reservations (firstname, lastname, email, adress, zipcode, city, phone, trailertype, straps, net, adapter, license_plate, drivers_license_number, reservationdate, starttime, endtime) 
VALUES ('$firstname', '$lastname', '$email','$adress', '$zipcode', '$city', '$phone', '$trailertype', '$straps', '$net', '$adapter', '$license_plate', '$drivers_license_number', '$reservationdate', '$starttime', '$endtime')";
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
    <article>
        Kloppen deze gegevens?<br><br>
        <table>
            <tr>
                <td>Voornaam:</td>
                <td><?php echo $firstname?></td>
                <td>Aanhanger:</td>
                <td><?= $trailertype?></td>
                <td>Kenteken:</td>
                <td><?php echo $license_plate?></td>
            </tr>
            <tr>
                <td>Achternaam:</td>
                <td><?php echo $lastname?></td>
                <td>Spanbanden:</td>
                <td><?= $straps?></td>
                <td>Rijbewijsnummer:</td>
                <td><?php echo $drivers_license_number?></td>
            </tr>
            <tr>
                <td>Adres:</td>
                <td><?php echo $adress?></td>
                <td>Span net:</td>
                <td><?= $net?></td>
                <td>Reserveringsdatum:</td>
                <td><?php echo $reservationdate?></td>
            </tr>
            <tr>
                <td>Postcode:</td>
                <td><?php echo $zipcode?></td>
                <td>Stroomadapter:</td>
                <td><?= $adapter?></td>
                <td>Starttijd:</td>
                <td><?php echo $starttime?></td>
            </tr>
            <tr>
                <td>Stad:</td>
                <td><?php echo $city?></td>
                <td></td>
                <td></td>
                <td>Eindtijd:</td>
                <td><?php echo $endtime?></td>
            </tr>
            <tr>
                <td>Telefoonnummer:</td>
                <td><?php echo $phone?></td>
            </tr>
        </table>
        <form>
            <input type="button" onclick="window.location.href='confirm.php'" value="Ja" >
            <input type="button" onclick="window.location.href='index.php'"  value="Nee, ga terug naar de vorige pagina"
        </form>
    </article>
</div>

<footer>Copyright &copy; 2019 Jaron Hoste</footer>
</body>

</html>
