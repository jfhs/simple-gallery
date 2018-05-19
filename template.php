<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple gallery</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>My cool gallery</h1>

<div class="gallery" id="gallery">
    <?php foreach ($links as $photo): ?>
        <div class="item">
            <a href="<?= $photo ?>">
                <img src="<?= $photo ?>">
            </a>
        </div>
    <?php endforeach; ?>
</div>

<div class="lightbox" id="lightbox">
    <img src="http://insomnia.rest/images/screens/main.png">
    <br/>
    <button id="email">Email</button>
    <button id="telegram">Telegram</button>
    <a href="#" class="close">X</a>
</div>

<script src="js/index.js"></script>

</body>

</html>