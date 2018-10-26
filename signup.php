<?php

require_once 'php/db_connection.php';

const ALERT_ERROR="Such username already exists.";

if (isset($_POST['signup-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM User WHERE username = '$username'";
    $check = $db->query($sql);
    $count_row = $check->num_rows;
    if ($count_row == 0) {
        $sql1 = "INSERT INTO User SET username = '$username', password = '$password'";
        $result = mysqli_query($db, $sql1) or die (mysqli_connect_errno() . " Writing error: Username - $username, Password - $password.");
    } else $alert = ALERT_ERROR;
}

?>

<head>
    <title><?=APP_NAME?></title>
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
