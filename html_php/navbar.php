<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <!--
    <meta charset="UTF-8">
    <title>you shouldn't see this</title>
    -->
</head>
<body>
<?php
echo '<nav style="top: 0;z-index: 1000;">
    <a href="index.php" id="logo">
        <img src="../other_img/favico.ico" alt="DD Logo" height="100" width="130">
    </a>
    <a href="index.php">Kezdőlap</a>
    <a href="contacts.php">Kapcsolat</a>';
    if (isset($_SESSION['user'])) {
        echo '<a href="logout.php" style="float: right">Kilépés</a>
              <a href="profile.php" style="float: right">Profilom</a>
              <a href="cart.php" style="float: right">Kosár</a>
          </nav>';
    } else {
        echo '<a href="registration.php" style="float: right">Regisztáció</a>
              <a href="login.php" style="float: right">Belépés</a>
          </nav>';
    }
?>
</body>
</html>