<?php

require_once 'php/db_connection.php';

?>

<head>
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

<div>
    <?php if (isset($_SESSION['id'])): ?>
        <h3>
            Welcome <?= '(' . $_SESSION['id'] . ')' . $_SESSION['login'] ?>
        </h3>
        <a class="btn btn-block btn-success" href="play.php">Play</a>
        <a class="btn btn-block btn-warning" href="scoreboard.php">Scoreboard</a>
        <a class="btn btn-block btn-warning" href="skins.php">Skins</a>
        <a class="btn btn-block btn-danger" href="logout.php">Log out</a>
    <?php else: ?>
        <a class="btn btn-block btn-success" href="play.php">Play as Guest</a>
        <a class="btn btn-block btn-primary" href="login.php">Log in</a>
        <a class="btn btn-block btn-primary" href="signup.php">Sign up</a>
    <?php endif; ?>
</div>
</body>
