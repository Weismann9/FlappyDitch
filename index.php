<?php

require_once 'php/db_connection.php';

?>

<head>
    <title><?= APP_NAME ?></title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="main.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/vendor/bootstrap.min.css">
    <script src="/vendor/jquery-3.3.1.slim.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/vendor/jquery.backgroundvideo.min.js"></script>
    <script src="/vendor/popper.min.js"></script>
    <script src="/vendor/bootstrap.min.js"></script>
    <script src="/vendor/background_video_settings.js"></script>
</head>
<body style="background-color: #818182">
<header>
    <a href="index.php" style="font-family: Lobster"><?= APP_NAME ?></a>
</header>

<div>
    <?php if (isset($_SESSION['id'])): ?>
        <div class="container main-menu-div col-4 bg-dark border border-white">
        <h3 style="text-align: center">
            Welcome <?= '(' . $_SESSION['id'] . ')' . $_SESSION['login'] ?>
        </h3>
        <a class="btn btn-block btn-success" href="play.php">Play</a>
        <a class="btn btn-block btn-warning" href="scoreboard.php">Scoreboard</a>
        <a class="btn btn-block btn-warning" href="skins.php">Skins</a>
        <a class="btn btn-block btn-danger" href="logout.php">Log out</a>
    </div>
        <?php else: ?>
    <div class="container main-menu-div col-4 bg-dark border border-white">
        <a class="btn btn-block btn-success " href="play.php">Play as Guest</a>
        <a class="btn btn-block btn-primary" href="login.php">Log in</a>
        <a class="btn btn-block btn-primary" href="signup.php">Sign up</a>
    </div>
    <?php endif; ?>
</div>
</body>
