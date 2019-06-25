<?php
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

require_once "database/database.php";

////If already logged in, no need to be here
//if (isset($_SESSION['name'])) {
//    header('Location: secure.php');
//    exit;
//}
//
////On post submit, check the credentials
//if (isset($_POST['submit'])) {
//    //Retrieve values (email safe for query)
//    $email = mysqli_escape_string($db, $_POST['email']);
//    $password = $_POST['password'];
//
//    //Get password & name from DB
//    $query = "SELECT password, name FROM admins
//              WHERE email = '$email'";
//    $result = mysqli_query($db, $query);
//
//    $user = mysqli_fetch_assoc($result);
//
//    //Go on if we got an user (which means email is correct)
//    if ($user) {
//        //Validate password
//        if (password_verify($password, $user['password'])) {
//            //Set session variable, redirect & exit script
//            $_SESSION['name'] = $user['name'];
//            header('Location: secure.php');
//            exit;
//        } else {
//            $message = "Je wachtwoord bestaat niet!";
//        }
//    } else {
//        $message = "Je email bestaat niet!";
//    }
//}
?>
<!DOCTYPE html>
<html xmlns:background-image="http://www.w3.org/1999/xhtml">
<head>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
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
            <h1 class="title">Aanhangwagens Karwei Krimpen</h1>
            <a>Nog <span id='timeLeft'></span> om te reserveren!</a>
            <div class="left">
                <a href="index.php"> <img src="files/karwei-logo.png" alt="Karwei Logo" style="width:110px;height:84px;"> </a>
            </div>
            <div class="right">
                <form method="post" action="<?= $_SERVER['REQUEST_URI']; ?>" style="">
                    <div class="loginform">
                        <label for="email">E-Mail:</label>
                        <input id="email" type="email" name="email"/>
                    </div>
                    <div class="loginform">
                        <label for="password">Wachtwoord:</label>
                        <input id="password" type="password" name="password" required/>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Login" required/>
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
                <div style="width: 33%; float: left">
                    <label for="firstname">Voornaam:*</label>
                    <input id="firstname" type="text" name="firstname" required><br>

                    <label for="lastname">Achternaam:*</label>
                    <input id="lastname" type="text" name="lastname" required><br>

                    <label for="res_email">Email:*</label>
                    <input id="res_email" type="email" name="email" required><br>

                    <label for="adress">Adres:*</label>
                    <input id="adress" type="text" name="adress" required><br>

                    <label for="zipcode">Postcode:*</label>
                    <input id="zipcode" type="text" name="zipcode" maxlength="6"required><br>

                    <label for="city">Stad:*</label>
                    <input id="city" type="text" name="city" required><br>

                    <label for="phone">Telefoonnummer:*</label>
                    <input id="phone" type="tel" name="phone" maxlength="10" required><br>
                </div>
                <div style="width: 33%; margin: auto; display: inline-block;">
                    <label for="trailertype">Aanhanger:*</label>
                    <select id="trailertype" name="trailertype">
                        <option value="Enkelasser">Enkel asser (Max 750 kg)</option>
                        <option value="Dubbelasser">Dubbel asser (Max 1350 kg)</option>
                    </select><br>
                    <br>Let op! Voor de dubbelasser geldt speciale <a target="_blank" href="https://www.rijksoverheid.nl/onderwerpen/rijbewijs/vraag-en-antwoord/met-welk-rijbewijs-mag-ik-een-motorvoertuig-met-aanhangwagen-besturen">wetgeving</a>!

                    <br><br>Extra accessoires:
                    <label  for="straps">Spanbanden</label>
                    <select id="straps" name="straps">
                        <option value="true">Ja</option>
                        <option value="false">Nee</option>
                    </select><br>
                    <label  for="net">Spannet</label>
                    <select id="net" name="net">
                        <option value="true">Ja</option>
                        <option value="false">Nee</option>
                    </select><br>
                    <label  for="adapter">Verloopstuk voor stroom</label>
                    <select id="adapter" name="adapter">
                        <option value="true">Ja</option>
                        <option value="false">Nee</option>
                    </select><br>

                </div>
                <div style="width: 33%; float: right;">
                    <label for="license_plate">Kenteken:*</label>
                    <input id="license_plate" type="text" name="license_plate" maxlength="6" required><br>

                    <label for="drivers_license_number">Rijbewijsnummer:*</label>
                    <input id="drivers_license_number" type="text" name="drivers_license_number" maxlength="10" required><br>

                    <label for="reservationdate">Reserveringsdatum:*</label>
                    <input id="reservationdate" type="date" name="reservationdate" required>

                    <label for="starttime">Starttijd:*</label>
                    <select id=starttime" name="starttime">
                        <option value="0900">09:00</option>
                        <option value="0915">09:15</option>
                        <option value="0930">09:30</option>
                        <option value="0945">09:45</option>
                        <option value="1000">10:00</option>
                        <option value="1015">10:15</option>
                        <option value="1030">10:30</option>
                        <option value="1045">10:45</option>
                        <option value="1100">11:00</option>
                        <option value="1115">11:15</option>
                        <option value="1130">11:30</option>
                        <option value="1145">11:45</option>
                        <option value="1200">12:00</option>
                        <option value="1215">12:15</option>
                        <option value="1230">12:30</option>
                        <option value="1245">12:45</option>
                        <option value="1300">13:00</option>
                        <option value="1315">13:15</option>
                        <option value="1330">13:30</option>
                        <option value="1345">13:45</option>
                        <option value="1400">14:00</option>
                        <option value="1415">14:15</option>
                        <option value="1430">14:30</option>
                        <option value="1456">14:45</option>
                        <option value="1500">15:00</option>
                        <option value="1515">15:15</option>
                        <option value="1530">15:30</option>
                        <option value="1545">15:45</option>
                        <option value="1600">16:00</option>
                        <option value="1615">16:15</option>
                        <option value="1630">16:30</option>
                        <option value="1645">16:45</option>
                        <option value="1700">17:00</option>
                        <option value="1715">17:15</option>
                        <option value="1730">17:30</option>
                        <option value="1745">17:45</option>
                        <option value="1800">18:00</option>
                        <option value="1815">18:15</option>
                        <option value="1830">18:30</option>
                        <option value="1845">18:45</option>
                        <option value="1900">19:00</option>
                        <option value="1915">19:15</option>
                        <option value="1930">19:30</option>
                        <option value="1945">19:45</option>
                        <option value="2000">20:00</option>
                        <option value="2015">20:15</option>
                        <option value="2030">20:30</option>
                    </select>
                    <label for="endtime">Eindtijd:*</label>
                    <select id="endtime" name="endtime">
                        <option value="0930">09:30</option>
                        <option value="0945">09:45</option>
                        <option value="1000">10:00</option>
                        <option value="1015">10:15</option>
                        <option value="1030">10:30</option>
                        <option value="1045">10:45</option>
                        <option value="1100">11:00</option>
                        <option value="1115">11:15</option>
                        <option value="1130">11:30</option>
                        <option value="1145">11:45</option>
                        <option value="1200">12:00</option>
                        <option value="1215">12:15</option>
                        <option value="1230">12:30</option>
                        <option value="1245">12:45</option>
                        <option value="1300">13:00</option>
                        <option value="1315">13:15</option>
                        <option value="1330">13:30</option>
                        <option value="1345">13:45</option>
                        <option value="1400">14:00</option>
                        <option value="1415">14:15</option>
                        <option value="1430">14:30</option>
                        <option value="1456">14:45</option>
                        <option value="1500">15:00</option>
                        <option value="1515">15:15</option>
                        <option value="1530">15:30</option>
                        <option value="1545">15:45</option>
                        <option value="1600">16:00</option>
                        <option value="1615">16:15</option>
                        <option value="1630">16:30</option>
                        <option value="1645">16:45</option>
                        <option value="1700">17:00</option>
                        <option value="1715">17:15</option>
                        <option value="1730">17:30</option>
                        <option value="1745">17:45</option>
                        <option value="1800">18:00</option>
                        <option value="1815">18:15</option>
                        <option value="1830">18:30</option>
                        <option value="1845">18:45</option>
                        <option value="1900">19:00</option>
                        <option value="1915">19:15</option>
                        <option value="1930">19:30</option>
                        <option value="1945">19:45</option>
                        <option value="2000">20:00</option>
                        <option value="2015">20:15</option>
                        <option value="2030">20:30</option>
                        <option value="2045">20:45</option>
                        <option value="2100">21:00</option>
                    </select>
                    <br><br>
                    <label><input type="checkbox" name="accept" required> Ik ga akkoord met de <a target="_blank" href="https://www.karwei.nl/klantenservice/voorwaarden-veiligheid/algemene-voorwaarden">Algemene voorwaarden</a> </label>

                    <br>
                    <input type="submit" name="submit"><br>
                </div>
            </form>
        </div>
    </article>
</div>
<footer>Copyright &copy; 2019 Jaron Hoste</footer>
</body>

</html>

