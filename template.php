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
    <?php foreach ($links as $item):
        $url = $item['url'];
        $type = $item['type'];
    ?>
        <div class="item">
            <a href="<?= $url ?>">
                <?php if ($type === 'video'): ?>
                    <video>
                        <source src="<?= $url ?>">
                    </video>
                <?php else: ?>
                    <img src="<?= $url ?>">
                <?php endif;?>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<div class="lightbox" id="lightbox">
    <img src="http://insomnia.rest/images/screens/main.png">
    <video controls>
    </video>
    <br/>
    <button id="email">Email</button>
    <button id="telegram">Telegram</button>
    <a href="#" class="close">X</a>
</div>

<script src="js/index.js"></script>

</body>

</html>