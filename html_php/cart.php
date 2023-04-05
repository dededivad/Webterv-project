<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DD Kosár</title>
    <link rel="stylesheet" href="../css/formatting.css"/>
    <link rel="icon" type="img/x-icon" href="../other_img/favico.ico">
</head>
<body>
<?php include_once('navbar.php')?>
<div class="wrapper-div">
    <div class="cart-box">
        <div class="cart-table-formatting-div">
        <section class="cart-item">
            <p style=" font-size: 35px; font-weight: bold; color: whitesmoke">Kosárban található termékek:</p>
        <table>
            <tr>
                <td>Balta</td>
                <td style="font-style: italic;">8000Ft</td>
            </tr>
            <tr>
                <td>Kerti kesztyű</td>
                <td style="font-style: italic;">2000Ft</td>
            </tr>
            <tr>
                <td>Összesen</td>
                <td style="font-style: italic;">10000Ft</td>
            </tr>
            <tr>
                <td>Szállítási költség</td>
                <td style="font-style: italic;">1600Ft</td>
            </tr>
        </table>
        </section>
        </div>
        <section class="cart-item">
        </section>
        <div class="cart-right-side">
            <table>
                <tr>
                    <td style="font-weight: bold;font-size: 35px">Végösszeg:</td>
                    <td style="font-weight: bold;font-size: 35px">11600Ft</td>
                </tr>
            </table>
            <button onclick="alert('Sikeres megrendelés, köszönjük!')" id="order-button" type="submit">Megrendelés!</button>
        </div>
    </div>

    <div class="video-wrapper">
        <p style="font-weight: bold; font-size: 26.5px">Nem tudod mire használd a szerszámodat?</p>
        <video src="../videos/metszoollo.mp4" controls></video>
    </div>
</div>
</body>
</html>