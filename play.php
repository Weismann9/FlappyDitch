<?php

require_once 'php/db_connection.php';

?>

<head>
    <meta charset="UTF-8">
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="main.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
</head>
<body>
<header>
    <a href="index.php">Menu</a>
</header>
<!--<script type="text/javascript" src="classes/ClassUser.js"></script>-->
<script type="text/javascript" src="vendor/jquery.js"></script>
<script type="text/javascript" src="vendor/phaser.js"></script>
<script type="text/javascript" src="scenes/MenuScene.js"></script>
<script type="text/javascript" src="scenes/GameScene.js"></script>
<script type="text/javascript" src="scripts/main.js"></script>
<?php if (isset($_SESSION['id'])):
    // BestScore always updates, but this value is used as initial.
    $id = $_SESSION['id'];
    $query = "SELECT score FROM User WHERE id=$id";
    $result = mysqli_query($db, $query);
    $initialBestScore = mysqli_fetch_array($result, MYSQLI_ASSOC)['score'];
    ?>
    <div id="user-data" typeof="user">
        <input id="user-id" value="<?= $_SESSION['id'] ?>">
        <input id="user-login" value="<?= $_SESSION['login'] ?>">
        <input id="user-bs" value="<?= $initialBestScore ?>">
    </div>
<?php else: ?>
    <div id="user-data" typeof="guest"></div>
<?php endif; ?>
</body>
