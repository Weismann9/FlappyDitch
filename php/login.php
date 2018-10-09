<?php 
$_login = $_POST['_login'];
$_passw = $_POST['_passw'];
$answer="blablaflapp";
$data = new mysqli('localhost','root','','FlappyDitch');
if (mysqli_connect_errno())	exit();
$sql2="SELECT Id FROM User WHERE Login = '$_login' AND Password = '$_passw'";
		$result = mysqli_query($data,$sql2);
		$usdata = mysqli_fetch_array($result);
		$count_rows = $result->num_rows;
		if ($count_rows == 1)
		{
			$_SESSION['Id']=$usdata['Id'];
			$answer = $usdata['Id'];
		} 
		else $answer = "blablaflapp";
echo $answer;
?>
