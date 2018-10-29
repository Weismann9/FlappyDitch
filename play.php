<?php

require_once 'src/project_init.php';

?>

<head>
    <?= RenderHead() ?>
</head>
<body style="background-color: black; text-align: center">
<header>
    <a href="index.php" style="font-family: Lobster"><?= APP_NAME ?></a>
</header>
<script type="text/javascript" src="/phaser/scenes/MenuScene.js"></script>
<script type="text/javascript" src="/phaser/scenes/GameScene.js"></script>
<script type="text/javascript" src="/phaser/Main.js"></script>
<?php if (isset($_SESSION['id'])):
    // BestScore usually updates ingame, so we usually refresh the page to update entry value from db, in case it changed.
    $id = $_SESSION['id'];
    $query = "SELECT score, skin FROM User WHERE id='$id'";
    $result = mysqli_query($db, $query);
    $additionalData = mysqli_fetch_array($result, MYSQLI_ASSOC);
    ?>
    <div class="d-none" id="user-data" typeof="user">
        <input id="user-id" value="<?= $_SESSION['id'] ?>">
        <input id="user-login" value="<?= $_SESSION['login'] ?>">
        <input id="user-bs" value="<?= $additionalData['score'] ?>">
        <input id="user-skin" value="<?= $additionalData['skin'] ?>">
    </div>
<?php else: ?>
    <div id="user-data" typeof="guest"></div>
<?php endif; ?>
</body>
