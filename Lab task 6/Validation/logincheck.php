<?php
session_start();
include_once('../Database/db.php');

$name = $_POST['uname'];
$password = $_POST['password'];


if (isset($_POST['submit'])) {
	if (empty($name) || empty($password)) {
		header('location:Login.php?login=empty');
		exit();
	}else{

		$sql = "select * from user where email ='".$name."' and password = '".$password."' ";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		//var_dump($resultCheck);
		
		if ($resultCheck < 1) {
			header('location:Login.php?Login=error1!');
			//var_dump($resultCheck);
			exit();
		}else{

			if($row = mysqli_fetch_assoc($result)){
				
				$_SESSION['id'] = $row['id'];
				$_SESSION['name'] = $row['fname'];
				$_SESSION['email'] = $row['email'];
				$pass = $row['password'];

				 if ($name == $_SESSION['email'] && $password == $pass) {
					//User home
					header('location:../view/Deshboard.php?login=Success');
			        exit();
				}
				}else{
			    	header('location:../Login.php?Login=invelid2!');
			    	exit();
				}  
			} 
		}
	}

?>
