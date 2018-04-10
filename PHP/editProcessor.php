<?php
  if (!isset($_GET['prod'])){
    header('Location: processor.php');
  }
  include "database.php";
  $prodID = $_GET['prod'];
  $sql = "SELECT PartID, Quanity, Brand, Model, Cores, ClockRate, BarCode from processor join bar_code on processor.BarCodeID = bar_code.BarCodeID join part_number on bar_code.BarCodeID = part_number.BarCodeID where PartID = ${prodID}";
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


    <table width="60%">
	<tr>
	    <th>
		Brand
	    </th>
		<th>
		Model
	    </th>
		<th>
		Cores
	    </th>
		<th>
		ClockRate
	    </th>
		<th>
		Bar Code
	    </th>
		<th>
		Quantity
	    </th>
	  </tr>


    <?php
      $rs = mysqli_fetch_array ($qry);
      extract($rs);
      print "<td>${Brand}</td><td>${Model}</td><td>${Cores}</td><td>${ClockRate}</td><td>${BarCode}</td><td>
      <input type='text' value='${Quanity}' name='qty'
      </td>";


    ?>
  </table>
  <input type="submit" value="Save Changes" /><input type="hidden" name="partid" value="<?=$PartID?>">
  </form>
  </body>
</html>
