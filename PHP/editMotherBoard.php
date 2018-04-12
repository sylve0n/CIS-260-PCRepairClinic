<?php
  if (!isset($_GET['prod'])){
    header('Location: motherboard.php');
  }
  include "database.php";
  $prodID = $_GET['prod'];
  $sql = "SELECT PartID, Quanity, IsNew, IsTested, Brand, Model, FormFactor, CpuBrand, Socket, Chipset, BarCode, PartNumber FROM motherboard join bar_code on motherboard.BarCodeID = bar_code.BarCodeID join part_number on bar_code.BarCodeID = part_number.BarCodeID where PartID = ${prodID}";
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
    <form method="post" action="motherboard.php">


    <table width="60%">
	<tr>
		<th>
		Quantity
	    </th>
		<th>
		Is New
	    </th>
		<th>
		Is Tested
	    </th>
		 <th>
		Brand
	    </th>
		<th>
		Model
	    </th>
		 <th>
		Form Factor
	    </th>
		<th>
		CPU Brand
	    </th>
		<th>
		Socket
	    </th>
		 <th>
		Chipset
	    </th>
		<th>
		Bar Code
	    </th>
		 <th>
		Part Number
	    </th>
	  </tr>


    <?php
      $rs = mysqli_fetch_array ($qry);
      extract($rs);
      print "<td><input type='text' value='${Quanity}' name='qty' size='3'/></td><td><input type='text' value='${IsNew}' name='new' size='2'/></td><td><input type='text' value='${IsTested}' name='test' size='2'/></td>
	  <td><input type='text' value='${Brand}' name='brand'/></td><td><input type='text' value='${Model}' name='model'/></td><td><input type='text' value='${FormFactor}' name='factor'/></td>
	  <td><input type='text' value='${CpuBrand}' name='cpu'/></td><td><input type='text' value='${Socket}' name='socket'/></td><td><input type='text' value='${Chipset}' name='chipset'/></td>
	  <td><input type='text' value='${BarCode}' name='barcode'/></td><td><input type='text' value='${PartNumber}' name='partnumber'/></td>";

    ?>
  </table>
  <input type="submit" value="Save Changes" /><input type="hidden" name="partid" value="<?=$PartID?>"/>
  </form>
  </body>
</html>
