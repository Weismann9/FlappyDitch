<?php

require_once 'src/project_init.php';

?>

<head>
    <?= RenderHead() ?>
    <!--  Show Video Explicitly ( Uses jQuery, load after vendors )  -->
    <script rel="script" type="text/javascript" src="<?= VENDORS_ROOT . 'jquery.backgroundvideo.min.js' ?>"></script>
    <script rel="script" type="text/javascript" src="<?= ASSETS_ROOT . 'background_video_settings.js' ?>"></script>
</head>
<body style="background-color: #818182; color: white">
<header>
    <a href="index.php" style="font-family: Lobster"><?= APP_NAME ?></a>
</header>
<div class="container">
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
        <tr>
            <th scope="row">Player</th>
            <th scope="row">Best Score</th>
        </tr>
        </thead>
        <?php
        $query = "SELECT username, score FROM User ORDER BY score DESC";
        $result = mysqli_query($db, $query);
        while ($users = mysqli_fetch_array($result, MYSQLI_ASSOC)):?>
            <tr class="<?= ($users['username'] == $_SESSION['login']) ? 'bg-danger' : '' ?>">
                <td><?= $users['username'] ?></td>
                <td><?= $users['score'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
