<?php
session_start();
include "authentication.php";


if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>


<?php

$profile_pic = "../profile_pics/default.png";
$path = "../profile_pics/" . $_SESSION["user"]["username"];

$extensions = ["png", "jpg", "jpeg"];

//error_log($path);

foreach ($extensions as $extension) {
    if (file_exists($path . "." . $extension)) {
        $profile_pic = $path . "." . $extension;
        //error_log("masodik".$profile_pic);
    }
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
        <hr style="width: 35%; float: left"/>

        <?php
        echo "<br>";
        echo "<div style='display: flex; flex-wrap: nowrap;'>";
        echo "<div style='flex: 1'>";
        echo '<img src="' . $profile_pic . '" alt="Profilkép" width="200"/>';
        echo "</div>";
        echo "<div style='flex: 10'>";
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
        echo "</ul>";
        echo "</div>";
        echo "</div>";
        //echo "</br>";
        echo "</br>";

        echo '
        <div style="display: flex;">
        <div style="width: 200px;">
        <form action="profile.php" method="POST" enctype="multipart/form-data">
            <label>
                Profilkép módosítása:
                <input type="file" name="profile_pic" accept="image/*" style="opacity: 0; width: 200px">
                <span class="file-input-button" style="width: 140px;margin-bottom: 5px">Kép kiválasztása</span>
            </label>
            <input type="submit" name="upload-btn" value="Módosítás"/>
        </form>
        </div>';

        if (isset($_POST["upload-btn"]) && is_uploaded_file($_FILES["profile_pic"]["tmp_name"])) {
            $file_upload_error = "";
            uploadProfilePicture($_SESSION["user"]["username"]);

            $who = strtolower(pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION));
            $path = "../profile_pics/" . $_SESSION["user"]["username"] . "." . $who;

            if ($file_upload_error === "") {
                if ($path !== $profile_pic && $profile_pic !== "../profile_pics/default.png") {
                    unlink($profile_pic);
                }

                header("Location: profile.php");
            } else {
                echo "<p>" . $file_upload_error . "</p>";
            }
        }
        echo '<div>
           <form action="profile_change.php" method="POST">
      
            <legend style="text-align: center">Profil adatainak módosítása:</legend>
            <br>
            <label class="reg-lb">Email:* <input value="'.$_SESSION["user"]['email'].'" type="email" name="email" placeholder="pl.: valaki@gmail.com" required/></label>
            <br/>
            <label class="reg-lb">Teljes név:* <input value="'.$_SESSION["user"]['full_name'].'" type="text" name="full_name" required/></label> <br/>
            <label class="reg-lb">Irányítószám:* <input value="'.$_SESSION["user"]['postal_code'].'" type="number" min="1000" name="postal_code" required/></label> <br/>
            <label class="reg-lb">Település:* <input value="'.$_SESSION["user"]['city'].'" type="text" name="city" required/></label> <br/>
            <label class="reg-lb">Lakcím:* <input value="'.$_SESSION["user"]['street_name'].'" type="text" name="street_name" required/></label> <br/>
            <label class="reg-lb">Telefonszám: <input value="'.$_SESSION["user"]['phone_number'].'" type="tel" name="phone_number"/></label> <br/>
            <input type="submit" name="edit" value="Módosítás" style="margin-left: 100px"/>
        </form>
        </div>';
        echo '
        </div>
        <br><br><br>
        <form action="profile.php" method="POST" enctype="multipart/form-data">
            <label>
                <p style="margin: 0px">Profil törlése</p> <p style="color: red; font-weight: bold; margin: 0px">(NEM FOGOD TUDNI VISSZAÁLLÍTANI, BIZTOS TÖRLÖD?)</p>
            </label>
            <input type="submit" name="delete-btn" style="background-color: red" value="Törlés"/>
        </form>';
        if (isset($_POST["delete-btn"])) {
            $username = $_SESSION["user"]["username"];
            $file = "../data/users.txt";
            $lines = file($file);
            foreach ($lines as $lineNumber => $lineContent) {
                if (strpos($lineContent, $username) !== false) {
                    unset($lines[$lineNumber]);
                    break;
                }
            }
            file_put_contents($file, implode('', $lines));
            $profile_pic = "../profile_pics/" . $username;
            foreach ($extensions as $extension) {
                if (file_exists($profile_pic . "." . $extension)) {
                    unlink($profile_pic . "." . $extension);
                }
            }
            header("Location: logout.php");
            exit();
        }
        ?>
    </section>
</main>
</body>
</html>