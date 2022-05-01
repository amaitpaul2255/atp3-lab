<?php
include_once('../DB/db.php');
	$name = false;
	$bprice = false;
	$sprice = false;

	$namevalue = $_POST['name'];
	$buyingvalue = $_POST['bprice'];
	$sellingvalue = $_POST['sprice'];

	if(!isset($_POST['submit'])){
		header('location:../view/Addproduct.php?save=empty!');
		echo "empty";
		exit();
	}

	if (empty($namevalue) || empty($buyingvalue) || empty($sellingvalue)
		) {
			header('location:../view/Addproduct.php?save=empty!');
		    echo "empty";
			exit();
	}

	if(is_numeric($namevalue[0]) && strlen($namevalue >= 2)){
		header('location:../view/Addproduct.php?save=empty!');
		exit();
	}

	$sql = "insert into profit (name, buying, selling) values ('".$namevalue."', '".$buyingvalue."', '".$sellingvalue."')";
	// var_dump($sql);
	   $result = mysqli_query($conn, $sql);
	   
    if ($result) {
    	header('location:../view/Display.php?message=success');
    }else{
    	echo "Data can't insert successfully!";
    }
    header('location:../view/Display.php?message=success');









?>