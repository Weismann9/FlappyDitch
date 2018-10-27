<?php

require_once 'php/db_connection.php';

const ALERT_ERROR="Such username already exists.";

if (isset($_POST['signup-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM User WHERE username = '$username'";
    $check = $db->query($query);
    $count_row = $check->num_rows;
    if ($count_row == 0) {
        $query_add = "INSERT INTO User SET username = '$username', password = '$password'";
        $result = mysqli_query($db, $query_add) or die (mysqli_connect_errno() . " Writing error: Username - $username, Password - $password.");
    } else $alert = ALERT_ERROR;
}

?>

<head>
    <title><?=APP_NAME?></title>
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
        <input name="_login" type="text">
        <label>Password</label>
        <input name="_password" type="text">
        <input name="signup-btn" type="submit" value="Sign Up" class="btn btn-success">
    </form>
    <?php if ($alert == ALERT_ERROR): ?>
        <h6 class="alert alert-info">
            <?= $alert ?>
        </h6>
    <?php endif; ?>
</div>
</body>
