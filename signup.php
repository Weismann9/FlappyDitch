<?php

require_once 'src/project_init.php';

const ALERT_ERROR = "Such username already exists.";

if (isset($_POST['signup-btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM User WHERE username = '$username'";
    $check = $db->query($query);
    $count_row = $check->num_rows;
    if ($count_row == 0) {
        $query_add = "INSERT INTO User SET username = '$username', password = '$password'";
        $result = mysqli_query($db, $query_add) or die (mysqli_connect_errno() . " Writing error: Username - $username, Password - $password.");
        header('location: index.php');
    } else $alert = ALERT_ERROR;
}

?>

<head>
    <?= RenderHead() ?>
    <!--  Show Video Explicitly ( Uses jQuery, load after vendors )  -->
    <script rel="script" type="text/javascript" src="<?= VENDORS_ROOT . 'jquery.backgroundvideo.min.js' ?>"></script>
    <script rel="script" type="text/javascript" src="<?= ASSETS_ROOT . 'background_video_settings.js' ?>"></script>
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
        <input name="signup-btn" type="submit" value="Sign Up" class="btn-block btn btn-success">
        <label class="btn-block">Already have an account? <a href="login.php">Log in</a></label>
    </form>
    <?php if ($alert == ALERT_ERROR): ?>
        <h6 class="alert alert-info">
            <?= $alert ?>
        </h6>
    <?php endif; ?>
</div>
</body>
