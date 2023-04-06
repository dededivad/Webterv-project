<?php
session_start();
include "authentication.php";
$profiles = loadUsers("../data/users.txt");

$message = "";

if (isset($_POST["login"])) {
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "" || !isset($_POST["password"]) || trim($_POST["password"]) === "") {
        $message = "Hiba: Adj meg minden adatot!";
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $message = "Sikertelen belépés! A belépési adatok nem megfelelők!";

        foreach ($profiles as $profile) {
           if ($profile["username"] === $username && password_verify($password, $profile["password"])) {
               echo "Sikeres belépés";
               $_SESSION["user"] = $profile;
               header("Location: index.php");
               break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DD Belépés</title>
    <link rel="stylesheet" href="../css/formatting.css"/>
    <link rel="icon" type="img/x-icon" href="../other_img/favico.ico">
</head>
<body>
<?php include_once('navbar.php')?>
<div class="wrapper-div">
    <form class="authentication-form" method="POST" action="login.php">
        <fieldset class="log-fs">
            <legend>Belépés</legend>
            <label class="log-lb"><input type="text" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" name="username" placeholder="Felhasználó név" required/></label>
            <br/>
            <label class="log-lb"><input type="password" name="password" placeholder="Jelszó" required/></label> <br/>
            <input type="submit" name="login" value="Belépés"/>
        </fieldset>
        <?php echo '<p class="error-msg">'.$message.'</p>' ?>
    </form>
</div>
</body>
</html>