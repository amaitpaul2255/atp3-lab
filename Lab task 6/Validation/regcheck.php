<?php
session_start();
include_once('../Database/db.php');

	$fname = false;
	$lname = false;
	$gender = false;
	$email = false;
	$phonenumber = false;
	$password = false;
	$conpassword = false;

	$fnamevalue = $_POST['fname'];
	$lnamevalue = $_POST['lname'];
	$gendervalue = $_POST['gender'];
	$Email = $_POST['email'];
	$phonevalue = $_POST['phonenumber'];
	$passwordvalue = $_POST['password'];
	$conpasswordvalue = $_POST['password1'];
	
	if(!isset($_POST['submit'])){
		header('location:../view/registration.php?signup=empty!');
		exit();
	}

	if (empty($fnamevalue) || empty($lnamevalue) || empty($Email) || 
		empty($phonevalue) || empty($passwordvalue) || empty($conpasswordvalue)) {
			header('location:../view/registration.php?signup=empty!');
			exit();
		}

	if(is_numeric($fnamevalue[0]) && strlen($fnamevalue >= 2)){
		header('location:../view/registration.php?signup=Fastnameerror!');
		//echo 'aaa';
		exit();
	}

	if(is_numeric($lnamevalue[0]) && strlen($lnamevalue >= 2)){
		header('location:../view/registration.php?signup=Lastnameerror!');
		exit();
		}
        
	// check first part 
	 $exploded = explode('@', $Email);		 
	if(strlen($exploded[0]) < 4 || is_numeric($exploded[0][0])){
		//var_dump($Email);
		header('location:../view/registration.php?error=NameNotValid');
		exit();
	}

 	 
	if(strlen($exploded[0]) < 4 || is_numeric($exploded[0][0])){
		//var_dump($Email);
		header('location:../view/registration.php?error=NameNotValid');
		exit();
	}

	// check middle part
	$exploded_vendor = explode('.', $exploded[1]);
	if(strlen($exploded_vendor[0]) > 8 || is_numeric($exploded_vendor[0])){
		header('location:../view/registration.php?error=NameNotValid1');
		exit();
	}

	//check last part
	if(strlen($exploded_vendor[1])  != 3){
		
		header('location:../view/registration.php?error=DotComNotValid');
		exit();
	}
	//phone Number
	if (is_numeric($phonevalue)) {
		if ((strlen($phonevalue) == 11) && ($phonevalue[0] == 0) && ($phonevalue[1] == 1)) {
			if (($phonevalue[2] == 7) || ($phonevalue[2] == 9) || ($phonevalue[2] == 6) || ($phonevalue[2] == 8) || ($phonevalue[2] ==  3)|| ($phonevalue[2] == 5)) {
					$phonenumber = true;
					$phonenumber = $phonevalue;
			}else{
				header('location:../view/registration.php?error=index2doesnotmatch');
			}
		}
		else{
			header('location:../view/registration.php?error=check11number');
		}
	}else{
		header('location:../view/registration.php?error=checkitsnumber');
	}
	//password Check
	if ($passwordvalue != $conpasswordvalue) {
		header('location:../view/registration.php?signup=passworderror!');
		//echo "hello1";
		exit();
	}

	
	

	$sql = "insert into user (fname, lname, gender, email, phone, password, conpassword) values ('".$fnamevalue."', '".$lnamevalue."', '".$gendervalue."', '".$Email."', '".$phonenumber."', '".$passwordvalue."', '".$conpasswordvalue."')";

	   $result = mysqli_query($conn, $sql);
	  

    if ($result) {
    	header('location:../view/home.php?message=success');
    }else{
    	echo "Data can't insert successfully!";
    } 
    //header('location:../view/home.php?message=success');
?>