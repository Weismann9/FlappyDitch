<?php

require_once 'php/db_connection.php';

?>

<head>
    <meta charset="UTF-8">
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="main.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/vendor/bootstrap.min.css">
    <script src="/vendor/jquery-3.3.1.slim.min.js"></script>
    <script src="/vendor/popper.min.js"></script>
    <script src="/vendor/bootstrap.min.js"></script>
</head>
<body>
<header>
    <a href="index.php">Menu</a>
</header>
<script type="text/javascript" src="vendor/jquery.js"></script>
<script type="text/javascript" src="vendor/phaser.js"></script>
<script type="text/javascript" src="scenes/MenuScene.js"></script>
<script type="text/javascript" src="scenes/GameScene.js"></script>
<script type="text/javascript" src="scripts/main.js"></script>
<?php if (isset($_SESSION['id'])):
    // BestScore usually updates ingame, so we usually refresh the page to update entry value from db, in case it changed.
    $id = $_SESSION['id'];
    $query = "SELECT score, skin FROM User WHERE id='$id'";
    $result = mysqli_query($db, $query);
    $additionalData = mysqli_fetch_array($result, MYSQLI_ASSOC);
    ?>
    <div id="user-data" typeof="user">
        <input id="user-id" value="<?= $_SESSION['id'] ?>">
        <input id="user-login" value="<?= $_SESSION['login'] ?>">
        <input id="user-bs" value="<?= $additionalData['score'] ?>">
        <input id="user-skin" value="<?= $additionalData['skin'] ?>">
    </div>
<?php else: ?>
    <div id="user-data" typeof="guest"></div>
<?php endif; ?>
</body>
