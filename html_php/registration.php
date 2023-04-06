<?php
include "authentication.php";
$path = "../data/users.txt";
$profiles = loadUsers($path);

$errors = [];

if (isset($_POST["register"])) {
    if (!isset($_POST["username"]) || trim($_POST["username"]) === "")
        $errors[] = "A felhasználónév megadása kötelező!";

    if (!isset($_POST["password_first"]) || trim($_POST["password_first"]) === "" ||
        !isset($_POST["password_second"]) || trim($_POST["password_second"]) === "")
        $errors[] = "A jelszó és az ellenőrző jelszó megadása kötelező!";

    if (!isset($_POST["email"]) || trim($_POST["email"]) === "")
        $errors[] = "Az email megadása kötelező!";

    if (!isset($_POST["full_name"]) || trim($_POST["full_name"]) === "")
        $errors[] = "A teljes név megadása kötelező!";

    if (!isset($_POST["postal_code"]) || trim($_POST["postal_code"]) === "")
        $errors[] = "Az irányítószám megadása kötelező!";

    if (!isset($_POST["city"]) || trim($_POST["city"]) === "")
        $errors[] = "A város megadása kötelező!";

    if (!isset($_POST["street_name"]) || trim($_POST["street_name"]) === "")
        $errors[] = "A lakcím megadása kötelező!";

    $username = $_POST["username"];
    $password_first = $_POST["password_first"];
    $password_second = $_POST["password_second"];
    $email = $_POST["email"];
    $full_name = $_POST["full_name"];
    $postal_code = $_POST["postal_code"];
    $city = $_POST["city"];
    $street_name = $_POST["street_name"];

    $phone_number = NULL;
    $profile_pic = NULL;

    if (isset($_POST["phone_number"]))
        $phone_number = $_POST["phone_number"];
    if (isset($_POST["profile_pic"]))
        $profile_pic = $_POST["profile_pic"];


    foreach ($profiles as $profile) {
        if ($profile["username"] === $username)
            $errors[] = "A felhasználónév már foglalt!";
    }

    if ($password_first !== $password_second)
        $errors[] = "A jelszó és az ellenőrző jelszó nem egyezik!";


    if (strlen($password_first) < 5 || strlen($password_second) < 5)
        $errors[] = "A jelszónak legalább 5 karakter hosszúnak kell lennie!";


    if ($postal_code < 1000 || $postal_code > 9999)
        $errors[] = "Ez az irányítószám Magyarországon nem létezik!";


    if (ctype_lower($city[0]))
        $errors[] = "A városneveket nagybetűvel írjuk!";


    if (count($errors) === 0) {
        $password = password_hash($password_first, PASSWORD_DEFAULT);
        $profiles[] = ["username" => $username, "password" => $password, "email" => $email, "full_name" => $full_name,
            "postal_code" => $postal_code, "city" => $city, "street_name" => $street_name, "phone_number" => $phone_number,
            "profile_pic" => $profile_pic];
        saveUsers($path, $profiles);
        $success = TRUE;
    } else {
        $success = FALSE;
    }
}
?>


<!DOCTYPE html>
<html lang="hu">
<head>
    <title>DD Regisztráció</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/formatting.css"/>
    <link rel="icon" type="img/x-icon" href="../other_img/favico.ico">
</head>

<body>
<?php include_once('navbar.php')?>
<div class="wrapper-div">
    <form class="authentication-form" method="POST" action="registration.php">
        <fieldset class="reg-fs">
            <legend>Regisztráció</legend>
            <label class="reg-lb">Felhasználónév:* <input value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" type="text" name="username" maxlength="20"
                                                          required/></label> <br/>
            <label class="reg-lb">Jelszó:* <input type="password" name="password_first" maxlength="20" required/></label> <br/>
            <label class="reg-lb">Jelszó újra:* <input type="password" name="password_second" maxlength="20" required/></label> <br/>
            <label class="reg-lb">Email:* <input value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" type="email" name="email" placeholder="pl.: valaki@gmail.com" required/></label>
            <br/>
            <label class="reg-lb">Teljes név:* <input value="<?php if (isset($_POST['full_name'])) echo $_POST['full_name']; ?>" type="text" name="full_name" required/></label> <br/>
            <label class="reg-lb">Irányítószám:* <input value="<?php if (isset($_POST['postal_code'])) echo $_POST['postal_code']; ?>" type="number" min="1000" name="postal_code" required/></label> <br/>
            <label class="reg-lb">Település:* <input value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>" type="text" name="city" required/></label> <br/>
            <label class="reg-lb">Lakcím:* <input value="<?php if (isset($_POST['street_name'])) echo $_POST['street_name']; ?>" type="text" name="street_name" required/></label> <br/>
            <label class="reg-lb">Telefonszám: <input value="<?php if (isset($_POST['phone_number'])) echo $_POST['phone_number']; ?>" type="tel" name="phone_number"/></label> <br/>
            <label class="reg-lb">
                Profilkép:
                <input type="file" value="<?php if (isset($_POST['profile_pic'])) echo $_POST['profile_pic']; ?>" name="profile_pic" style="opacity: 0; position: absolute; left: -9999px;">
                <span class="file-input-button">Kép kiválasztása</span>
            </label>
            <br>
            <input type="submit" name="register" value="Regisztráció"/>
            <input type="reset" value="Alapállapot"/>
        </fieldset>
    </form>
</div>
<?php
if (isset($success) && $success === TRUE) {
    header("Location: login.php");
} else {
    foreach ($errors as $error) {
        echo "<br><p class='error-msg'>" . $error . "</p>";
    }
}
?>
</body>
</html>
