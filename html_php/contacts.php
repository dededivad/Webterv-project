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

<div class="chat-btn">
    <p id="chat-button-msg" style="font-weight: bold; font-size: 20px">Chat ablak</p>
    <button id="chat-toggle-btn"></button>
</div>

<div class="chat-window">
    <div class="chat-header">
        <h3>Chat</h3>
        <p>(Ablak bezárása a kis ikonnal):</p>
        <button id="chat-close-btn"></button>
    </div>
    <div class="chat-body">
    </div>
    <div class="chat-messages-window">
        <input type="text" id="chat-input" placeholder="Írd be az üzeneted, majd kattints a gombra!">
        <button id="chat-send-btn" value="Küldés"></button>
    </div>
</div>

<script>
    const image = document.querySelector('.maps img');
    const modal = document.createElement('div');
    modal.classList.add('modal');
    modal.addEventListener('click', function() {
        modal.classList.remove('show');
    });

    image.addEventListener('click', function() {
        modal.innerHTML = '<img src="' + image.src + '" alt="Location on Google Maps">';
        modal.classList.add('show');
    });

    document.body.appendChild(modal);

    const chatBtn = document.querySelector('.chat-btn');
    const chatWindow = document.querySelector('.chat-window');
    const chatToggleBtn = document.querySelector('#chat-toggle-btn');
    const chatCloseBtn = document.querySelector('#chat-close-btn');
    const chatButtonMsg = document.querySelector('#chat-button-msg');

    chatBtn.addEventListener('click', function() {
        chatWindow.style.display = 'block';
        chatButtonMsg.style.display = 'none';
    });

    chatCloseBtn.addEventListener('click', function() {
        chatWindow.style.display = 'none';
        chatButtonMsg.style.display = 'block';
    });

    chatToggleBtn.addEventListener('click', function() {
        chatWindow.classList.toggle('show');
        chatButtonMsg.style.display = 'none';
    });

    const chatSendBtn = document.querySelector('#chat-send-btn');
    const chatBody = document.querySelector('.chat-body');

    chatSendBtn.addEventListener('click', () => {
        const message = document.createElement('div');
        message.innerHTML = 'Sajnos egyik ügyintézőnk se elérhető, írj e-mailt, és 2 munkanapon belűl válaszolunk! Leírt üzenetedet csatoljuk egy file-ban, ezt kérlek mentsd le, és csatold az emailhez!';
        message.classList.add('left-message');
        chatBody.appendChild(message);

        const chatLog = document.getElementById('chat-input').value;
        const downloadLink = document.createElement('a');
        const file = new Blob([chatLog], {type: 'text/plain'});
        downloadLink.href = URL.createObjectURL(file);
        downloadLink.download = 'chat_log.txt';
        downloadLink.click();
    });
</script>
</body>
</html>