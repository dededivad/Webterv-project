<?php
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <title>DD Profilom</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formatting.css"/>
    <link rel="icon" type="img/x-icon" href="../other_img/favico.ico"/>
</head>
<body>
<main>
    <?php include_once('navbar.php'); ?>
    <section id="content">
        <h2 style="margin-top: 160px">&nbsp;&nbsp;&nbsp;&nbsp;Profilom</h2>
        <hr style="width: 30%; float: left"/>

        <?php
        echo "<br>";
        echo "<ul>";
        echo "<li>Felhasználónév: " . $_SESSION["user"]["username"] . "</li>";
        echo "<li>Email: " . $_SESSION["user"]["email"] . "</li>";
        echo "<li>Teljes név: " . $_SESSION["user"]["full_name"] . "</li>";
        echo "<li>Irányítószám: " . $_SESSION["user"]["postal_code"] . "</li>";
        echo "<li>Város: " . $_SESSION["user"]["city"] . "</li>";
        echo "<li>Lakcím: " . $_SESSION["user"]["street_name"] . "</li>";
        echo "<li>Telefonszám: ";
        if (!($_SESSION["user"]["phone_number"] === "")) {
            echo $_SESSION["user"]["phone_number"];
        } else {
            echo ' -';
        }
        echo "</li>";
        echo "<li>Profilkép: ";
        if (!($_SESSION["user"]["profile_pic"] === "")) {
            echo $_SESSION["user"]["profile_pic"];
        } else {
            echo ' -';
        }
        echo "</li>";
        echo "</ul>";
        ?>
    </section>
</main>
</body>
</html>