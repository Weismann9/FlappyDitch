<?php 
$data = new mysqli('localhost','root','','FlappyDitch');
if (mysqli_connect_errno())	exit();

$_usid = $_POST['_usid'];
$answer="new";

$sql="SELECT Score FROM `scores` WHERE (UserId='$_usid') order by Score desc limit 1";

$result = mysqli_query($data,$sql);
$usdata = mysqli_fetch_array($result);

$best =$usdata['Score'];
echo $best;
?>
