<?php
  include_once('../DB/db.php');
?>
<!DOCTYPE html>
<html>
<body>
<fieldset>
        <legend>Display</legend>
<form action="#">

<?php
    //View details
    $sql = "select * from profit;";
    $result = mysqli_query($conn, $sql);
    echo "<table border='1'>
          <tr>
            <td>Name</td>
            <td>Profit</td>
            <td colspan='2'>Action</td>
          </tr>";
    $resultCheck = mysqli_num_rows($result);
    //var_dump($result);
    if ($resultCheck > 0) {
      while($rows = mysqli_fetch_assoc($result))
        {
          $buying = $rows['buying'];
          $selling = $rows['selling'];
          $value = $selling -$buying;
        echo "<tr>
            <td>{$rows['name']}</td>
            <td>$value</td>
            <td><a href='Editproduct.php?ui=$rows[id]'>Edit</a></td>
            <td><a href='Delete.php?ui=$rows[id]'>Delete</a></td>
          </tr>";
      }
    }
  ?>
  <a href="Addproduct.php">Back</a>

</table>
</form>
</fieldset>


</body>
</html>