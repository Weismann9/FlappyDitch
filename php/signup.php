<?php 
$data = new mysqli('localhost','root','','FlappyDitch');
if (mysqli_connect_errno())	exit();

$_login = $_POST['_login'];
$_password = $_POST['_password'];
$answer="vse horosho";
$sql="SELECT * FROM User WHERE Login = '$_login'";
		$check = $data->query($sql);
		$count_row=$check->num_rows;

		if ($count_row==0)
		{
			$sql1="INSERT INTO User SET Login = '$_login', Password = '$_password'";
			$result = mysqli_query($data, $sql1) or die (mysqli_connect_errno()."Помилка запису");
		//	return $result;
		}
		else $answer = "dumoi novoe imya";	
echo $answer;
?>
