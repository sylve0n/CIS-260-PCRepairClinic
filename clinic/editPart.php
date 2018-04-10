<?php
  if (!isset($_GET['prod'])){
    header('Location: processor.php');
  }
  include "../database.php";
  $prodID = $_GET['prod'];
  $sql = "SELECT * from processor where PartID = ${prodID}";
  $qry = mysqli_query($db, $sql);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Part</title>
  </head>
  <body>

    <h2>Edit Part</h2>
    <form method="post" action="processor.php">


    <table>


    <?php
      $rs = mysqli_fetch_array ($qry);
      extract($rs);
      print "<td>${PartID}</td><td> ${Series}</td><td>
      <input type='text' value='${Quanity}' name='qty'
      </td>";


    ?>
  </table>
  <input type="submit" value="Save Changes" /><input type="hidden" name="partid" value="<?=$PartID?>">
  </form>
  </body>
</html>
