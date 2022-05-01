<?php
 include_once('../DB/db.php');

$id = $_POST['id'];

$name = $_POST['name'];
$bprice = $_POST['bprice'];
$sprice = $_POST['sprice'];

if(!isset($_POST['submit'])){
	header('location:../view/Addproduct.php?save=empty!');
	echo "empty";
	exit();
}

if (empty($name) || empty($bprice) || empty($sprice)
	) {
		header('location:../view/Addproduct.php?save=empty!');
	    echo "empty";
		exit();
}

if(is_numeric($name[0]) && strlen($name >= 2)){
	header('location:../view/Addproduct.php?save=empty!');
	exit();
}

$sql = "update profit set name='$name', buying='$bprice', selling='$sprice' where id = '$id'; ";
 //var_dump($sql);
   $result = mysqli_query($conn, $sql);
   
if ($result) {
	header('location:../view/Display.php?message=success');
}else{
	echo "Data can't Update successfully!";
}
header('location:../view/Display.php?message=success');









?>