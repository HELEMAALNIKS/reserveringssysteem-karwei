<?php
require_once "database/database.php";
session_start();

//Mag ik hier uberhaupt komen???
if (!isset($_SESSION['login'])){    // checkt of er een sessie in werking is
    header("Location: index.php");
    exit;
}

//Haal email op uit sessie
$username = $_SESSION['login'];

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
                <?= $username; ?><br>
                <form>
                    <input type="button" value="Uitloggen" onclick="window.location.href='logout.php'" />
                </form>
            </div>
            </form>
        </div>
    </header>

    <div class="flex">
        <?php
        // Create connection
        $conn = new mysqli($host, $user, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $request = "SELECT id, firstname, lastname, email, adress, zipcode, city, phone FROM reservations";
        $result = mysqli_query($db, $request);

        $data = [];

        while ($row = mysqli_fetch_array($result)) {
            $data [] = $row;
        }

        ?>
        <table style='margin: auto; padding-top: 10px;'>
            <tr>
                <th>ID</th>
                <th>Naam</th>
                <th>Email</th>
                <th>Adres</th>
                <th>Postcode</th>
                <th>Plaats</th>
                <th>Telefoonnummer</th>
            </tr>
        <?

        foreach ($data as $reservation) {
            ?>
                <tr><td><?=$reservation["id"];?></td>
                    <td><?=$reservation["firstname"]. " " . $row["lastname"];?></td>
                    <td><?= $reservation["email"];?></td>
                    <td><?= $reservation["adress"]; ?></td>
                    <td><?= $reservation["zipcode"]; ?></td>
                    <td><?= $reservation["city"]; ?></td>
                    <td><?= $reservation["phone"]; ?></td>
                    <td>
                        <form method='post' action='detail.php'>
                            <input type="hidden" name="reservation" value="<?= htmlentities($reservation['id']);?>">
                            <input type="submit" value="Meer info"></form>
                        <form method='post' action='edit.php'>
                            <input type="hidden" name="reservation" value="<?= htmlentities($reservation['id']);?>">
                            <input type="submit" value="Wijzigen"></form>
                        <form method='post' action='delete.php'>
                            <input type="hidden" name="reservation" value="<?= htmlentities($reservation['id']);?>">
                            <input type="submit" value="Verwijderen"></form>
                    </td>
                </tr>
        <?}
?>        </table><?
        $db->close();
        ?>
    </div>
</div>

</body>

</html>

