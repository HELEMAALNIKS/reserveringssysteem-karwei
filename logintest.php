<?php
//include the config.php file
require_once 'database/database.php';

//start the session
session_start();

//check if the form has been submitted
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //check if submitted username and password are correct
    $sql = "SELECT * FROM users WHERE username='$username' and password='$password'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result);

    // if the login is correct, make a new session then redirect to index.php
    if ($count == 1){
        $_SESSION['username'] = $row['username'];
        if (isset($_SESSION['username'])){
            header ('Location: index.php');
        }
    }
}


session_start();
//Chek if post isset
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "" || $password == "") {
        $error = "Vul beide gegevens in";
    } elseif ($email != "robert@karwei.nl" || $password != "test") {
        $error = "Combinatie gebruikersnaam/wachtwoord onjuist";
    }
    if (!isset($error)) {
        $_SESSION['login'] = $email;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/personal.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="background">
<div class="row">
    <div class="pink lighten-3" style="width: 100%; height: 100px;">
    </div>
</div>
<div class="pink lighten-3" id="mydiv" style="height: auto;">
    <div id="mydivheader">Drag here</div>
    <a href="behandelingen.php" class="menu-button">Behandelingen</a><br/>
    <br/>
    <a href="contact.php" class="menu-button">Contact</a><br/>
    <br/>
    <a href="reserveren.php" class="menu-button">Reserveren</a>
</div>
<div class="row">
    <div class="col s12 m8 l8 offset-s2 offset-m2 offset-l2">
        <div class="card pink lighten-3" style="padding: 20px; border-radius: 20px;">
            <form action="loginClass.php" method="post">
                Gebruikersnaam:
                <input class="white" type="text" name="username" required/>

                Wachtwoord:
                <input class="white" type="password" name="password" required/>
                <br/>

                <input class="waves-effect waves-light btn white" type="submit" name="submit" value="Log in"/>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
    //Make the DIV element draggable:
    dragElement(document.getElementById("mydiv"));

    function dragElement(elmnt){
        let pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        if (document.getElementById(elmnt.id + "header")){
            // if present, the header is where you move the DIV from:
            document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
        } else {
            // otherwise, move the DIV from anywhere insdie the DIV:
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e){
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves;
            document.onmousemove = elementDrag;
        }

        function elementDrag(e){
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
            elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        }

        function closeDragElement(){
            // stop moving when mouse button is released:
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
</script>
</body>
</html>
