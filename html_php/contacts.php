<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DD Kapcsolat</title>
    <link rel="stylesheet" href="../css/formatting.css"/>
    <link rel="icon" type="img/x-icon" href="../other_img/favico.ico">
</head>
<body>
<?php include_once('navbar.php')?>
<div class="map-wrapper">
    <div class="maps">
        <img id="map-img" src="../other_img/map.png" alt="Location on Google Maps" width="650" height="400" style="border: solid dodgerblue 3px">
    </div>
    <div class="contact-info">
        <p>(Kattints a képre, a nagyításhoz!)</p>
        <p style="font-weight: bold">Cím:6724, Szeged, Londoni krt. 1</p>
        <p style="font-weight: bold">Telefon szám:+36(20)123 4567</p>
        <p style="font-weight: bold">Email:ddtoolsinfo@ddtools.com</p>
    </div>
</div>
<script>
    const image = document.querySelector('.maps img');
    const modal = document.createElement('div');
    modal.classList.add('modal');
    modal.addEventListener('click', () => {
        modal.classList.remove('show');
    });

    image.addEventListener('click', () => {
        modal.innerHTML = `<img src="${image.src}" alt="Location on Google Maps">`;
        modal.classList.add('show');
    });

    document.body.appendChild(modal);
</script>
</body>
</html>