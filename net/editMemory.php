<?php
  if (!isset($_GET['prod'])){
    header('Location: memory.php');
  }
  include "../global/database.php";
  include "../global/imports.php";
  $prodID = $_GET['prod'];
  $sql = "SELECT PartID, Quanity, IsNew, IsTested, Brand, Type, Rate, StandardName, ModuleName, IsLowVoltage, BarCode, PartNumber FROM memory join bar_code on memory.BarCodeID = bar_code.BarCodeID join part_number on bar_code.BarCodeID = part_number.BarCodeID where PartID = ${prodID}";
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
    <form method="post" action="memory.php">


    <table width="100%">
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
		Type
	  </th>
	  <th>
		Rate
	  </th>
	  <th>
		Module Name
	  </th>
	  <th>
		Is Low Voltage
	  </th>
	  <th>
		Part Number
	  </th>
    </tr>

    <?php
      $rs = mysqli_fetch_array ($qry);
      extract($rs);
      print "
      <td><input type='text' value='${Quanity}' name='qty'/></td>
      <td>
        <label>
          <input type='checkbox' name='new' />
          <span></span>
        </label>
      </td>
      <td>
        <label>
            <input type='checkbox' name='test' />
            <span></span>
        </label>
      </td>
      <td><input type='text' value ='${Brand}' name='brand' size='6'/></td>
      <td><input type='text' value='${Type}' name='type'/></td>
      <td><input type='text' value='${Rate}' name='rate' size='10'/></td>
      <td><input type='text' value='${ModuleName}' name='mname'/></td>
      <td>
        <label>
            <input type='checkbox' name='voltage' />
            <span></span>
        </label>
      </td>
      <td><input type='text' value='${PartNumber}' name='pnum'/></td>";


    ?>
	
  </table>
  <input type="submit" value="Save Changes" /><input type="hidden" name="partid" value="<?=$PartID?>">
  </form>
  </body>
</html>
