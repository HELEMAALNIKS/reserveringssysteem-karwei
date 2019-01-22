<?php
session_start();
//Chek if post isset
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email == "" || $password == ""){
        $error = "Vul beide gegevens in";
    } elseif($email != "jaron@hmcnetwork.nl" || $password != "test") {
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

?>
<!DOCTYPE html>
<html xmlns:background-image="http://www.w3.org/1999/xhtml">
<head>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Karwei Krimpen</title>
    <script type="text/javascript">
        var datefield = document.createElement("input")
        datefield.setAttribute("type", "date")
        if (datefield.type != "date") { //if browser doesn't support input type="date", load files for jQuery UI Date Picker
            document.write('<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"><\/script>\n')
            document.write('<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"><\/script>\n')
        }
    </script>
    <script>
        if (datefield.type != "date") { //if browser doesn't support input type="date", initialize date picker widget:
            jQuery(function ($) { //on document.ready
                $('#reservationdate').datepicker();
            })
        }
    </script>
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
                    <?php if (isset($error)) { ?>
                    <?= $error; ?>
                        <?php } ?>
            </div>
            </form>
        </div>
    </header>
</div>
<div class="flex">
    <nav>
        <ul>
            <li><a class="active">Vul gegevens in</a></li>
            <li><a>Bevestig reservering</a></li>
            <li><a>Aanhanger ophalen</a></li>
        </ul>
    </nav>

    <article>
        <div class="reservation" id="reserveration">
            <form action="reservation.php" method="post">
                <div style="width: 50%; float: left">
                    <label for="firstname">Voornaam:</label>
                    <input id="firstname" type="text" name="firstname" required><br>

                    <label for="lastname">Achternaam:</label>
                    <input id="lastname" type="text" name="lastname" required><br>

                    <label for="res_email">Email:</label>
                    <input id="res_email" type="email" name="email" required><br>

                    <label for="adress">Adres:</label>
                    <input id="adress" type="text" name="adress" required><br>

                    <label for="zipcode">Postcode:</label>
                    <input id="zipcode" type="text" name="zipcode" maxlength="6"required><br>

                    <label for="city">Stad:</label>
                    <input id="city" type="text" name="city" required><br>

                    <label for="phone">Telefoonnummer:</label>
                    <input id="phone" type="tel" name="phone" maxlength="10" required><br>
                </div>
                <div style="width: 50%; float: right">
                    <label for="license_plate">Kenteken:</label>
                    <input id="license_plate" type="text" name="license_plate" maxlength="6" required><br>

                    <label for="drivers_license_number">Rijbewijsnummer:</label>
                    <input id="drivers_license_number" type="text" name="drivers_license_number" maxlength="10" required><br>

                    <label for="reservationdate">Reserveringsdatum</label>
                    <input id="reservationdate" type="date" name="reservationdate" required>

                    <label for="starttime">Starttijd:</label>
                    <select id=starttime" name="starttime">
                        <option value="1930">19:30</option>
                        <option value="1945">19:45</option>
                        <option value="2000">20:00</option>
                        <option value="2045">20:45</option>
                    </select>

                    <label for="endtime">Eindtijd:</label>
                    <select id="endtime" name="endtime">
                        <option value="1930">19:30</option>
                        <option value="1945">19:45</option>
                        <option value="2000">20:00</option>
                        <option value="2045">20:45</option>
                    </select>

                    <input type="submit" name="submit"><br>
                </div>
            </form>
        </div>
    </article>
</div>
<footer>Copyright &copy; 2019 Jaron Hoste</footer>
</body>

</html>

