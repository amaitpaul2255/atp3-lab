<!DOCTYPE html>
<html>
<body>
<fieldset>
        <legend>Add Product</legend>
<form method="POST" action="../validation/Addproductvalidation.php">
  <label for="fname">Name:</label><br>
  <input type="text" name="name" value="" ><br>
  
  <label for="lname">Buying Price:</label><br>
  <input type="text" name="bprice" value=""><br>
  
  <label for="lname">Selling Price:</label><br>
  <input type="text" name="sprice" value="">
  <hr>
  <a href="Display.php">Display</a>
  <hr>
  <input type="submit" name="submit" value="SAVE">
</form>
</fieldset>


</body>
</html>