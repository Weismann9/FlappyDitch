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
<table class="table table-bordered table-hover">
    <thead class="thead-default">
    <tr>
        <th scope="row">Player</th>
        <th scope="row">Best Score</th>
    </tr>
    </thead>
    <?php
    $query = "SELECT username, score FROM User ORDER BY score DESC";
    $result = mysqli_query($db, $query);
    $next = false;
    while ($users = mysqli_fetch_array($result, MYSQLI_ASSOC)): ?>
        <!--Bodgan, kogda budesh jeboshit, sdelai chtob score current usera videlyalsa in table-->
        <tr>
            <?php foreach ($users as $key => $value):
                if ($value == $_SESSION['login']): $next = true; ?>
                    <td style="color: red"><?= $value ?></td>
                <?php else:
                    if ($next == false): ?>
                        <td><?= $value ?></td>
                    <?php else: $next = false ?>
                        <td style="color: red"><?= $value ?></td>
                    <?php endif;
                endif;
            endforeach; ?>
        </tr>
    <?php endwhile; ?>
</table>
</body>
