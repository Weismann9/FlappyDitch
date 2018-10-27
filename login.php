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
    <form method="post">
        <label>Username</label>
        <input name="username" type="text">
        <label>Password</label>
        <input name="password" type="text">
        <input name="login-btn" type="submit" value="Login" class="btn btn-success">
    </form>
    <?php if ($alert == ALERT_ERROR): ?>
        <h6 class="alert alert-danger">
            <?= $alert ?>
        </h6>
    <?php endif; ?>
</div>
</body>
