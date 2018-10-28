<?php

require_once 'php/db_connection.php';

const ALERT_ERROR = "Wrong username or password.";

if (isset($_POST['login-btn'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    if (mysqli_connect_errno()) exit();

    $query = "SELECT * FROM User WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);
    $rowCount = $result->num_rows;

    if ($rowCount == 1) {
        $user = mysqli_fetch_array($result);
        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['username'];
        header('location: index.php');
    } else $alert = ALERT_ERROR;

}

?>

<head>
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/vendor/bootstrap.min.css">
    <script src="/vendor/jquery-3.3.1.slim.min.js"></script>
    <script src="/vendor/popper.min.js"></script>
    <script src="/vendor/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/vendor/jquery.backgroundvideo.min.js"></script>
    <script src="/vendor/background_video_settings.js"></script>
</head>
<body style="background-color: #818182">
<header>
    <a href="index.php" style="font-family: Lobster"><?= APP_NAME ?></a>
</header>
<div>
    <form class="container main-menu-div col-4 bg-dark border border-white" method="post">
        <label class="btn-block">Username</label>
        <input class="btn-block input_text" name="username" type="text">
        <label class="btn-block">Password</label>
        <input class="btn-block input_text" name="password" type="password">
        <input name="login-btn" type="submit" value="Login" class="btn-block btn btn-success">
        <label class="btn-block">You do not have an account? <a href="signup.php">Sing up</a></label>
    </form>
    <?php if ($alert == ALERT_ERROR): ?>
        <h6 class="alert alert-danger">
            <?= $alert ?>
        </h6>
    <?php endif; ?>
</div>
</body>
