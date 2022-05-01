<?php
include_once('../DB/db.php');
$id = $_GET['ui'];
$sql = "select * from profit where Id = $id;";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);


?>


<!DOCTYPE html>
<html>
	<head>
		<title>Delete Form</title>
	</head>
	<body>
		<form method="POST" action="../validation/deletecheck.php">
			<fieldset>
				<legend>Delete Form</legend>
				<table>
					<tr>
						<td><input type="hidden" name="id" value="<?=$id?>"></td>
						<td></td>
					</tr>
					<tr>
						<td>Do you want to delete?? </td>
						<td>Product Name:<?=$rows['name'];?></td>
					</tr>
					<tr>
						<td>Buying price: </td>
						<td><?=$rows['buying'];?></td>
					</tr>
					<tr>
						<td><button type="submit" name="submit">Delete</button></td>
						<td><a href="Display.php">Cancel</a></td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>
</html>
