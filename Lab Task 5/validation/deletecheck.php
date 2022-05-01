<?php
  include_once('../DB/db.php');

$ID = $_POST['id'];
$sql = "delete from profit where Id =$ID ";
$result = mysqli_query($conn, $sql);
	if($result)
	{
		header('location:../view/Display.php?delete=successful!');
	}
	else
	{
		echo "Try Again!!!!";
	}
?>
