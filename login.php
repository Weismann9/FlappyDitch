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
