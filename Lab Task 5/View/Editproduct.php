<?php
  include_once('../DB/db.php');
  $userid = $_GET['ui'];
  $sql = "select * from profit where id = $userid;";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<body>
<fieldset>
        <legend>Edit Form</legend>
<form method="POST" action="../validation/Updateproduct.php">
  <label for="fname">Name:</label><br>
  <input type="text" name="name" value="<?=$rows['name'];?>" ><br>
  
  <label for="lname">Buying Price:</label><br>
  <input type="text" name="bprice" value="<?=$rows['buying'];?>"><br>
  
  <label for="lname">Selling Price:</label><br>
  <input type="text" name="sprice" value="<?=$rows['selling'];?>">
 
  <input type="submit" name="submit" value="Update">
</form>
</fieldset>


</body>
</html> 