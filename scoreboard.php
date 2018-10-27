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
<table>
    <tr>
        <th>Player</th>
        <th>Best Score</th>
    </tr>
    <?php
    $query = "SELECT username, score FROM User ORDER BY score DESC";
    $result = mysqli_query($db, $query);
    while ($users = mysqli_fetch_array($result, MYSQLI_ASSOC)): ?>
        <!--Bodgan, kogda budesh jeboshit, sdelai chtob score current usera videlyalsa in table-->
        <tr>
            <?php foreach ($users as $key => $value): ?>
                <td><?= $value ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endwhile; ?>
</table>
</body>
