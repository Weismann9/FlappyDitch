<?php

require_once 'php/db_connection.php';

?>

<head>
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="main.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
