<?php

require_once 'project_init.php';

$userId = $_POST['userId'];
$score = $_POST['bestScore'];

$query = "UPDATE User SET Score = $score WHERE Id=$userId";
$result = mysqli_query($db, $query) or die (mysqli_connect_errno() . " Writing error: UserId - $userId, Score - $score.");


