<?php 
$data = new mysqli('localhost','root','','FlappyDitch');
if (mysqli_connect_errno())	exit();

$_score = $_POST['_score'];
$_usid = $_POST['_usid'];
$answer="new";

$sql="SELECT * FROM scores WHERE ((Score > '$_score') AND (UserId = '$_usid'))";
		$check = $data->query($sql);
		$count_row=$check->num_rows;
		if ($count_row==0)
		{
			$sql1="INSERT INTO scores SET Score = '$_score', UserId = '$_usid'";
			$result = mysqli_query($data, $sql1) or die (mysqli_connect_errno()."Помилка запису");
			return $result;
		}
		else $answer = "not new";	
echo $answer;
?>
