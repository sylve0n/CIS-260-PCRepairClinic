<?php
  if (!isset($_GET['prod'])){
    header('Location: processor.php');
  }
  include "../global/database.php";
  $prodID = $_GET['prod'];
  $sql = "SELECT PartID, Quanity, IsNew, IsTested, Brand, Model, Cores, ClockRate, Socket, CodeName, BarCode ,PartNumber from processor join bar_code on processor.BarCodeID = bar_code.BarCodeID join part_number on bar_code.BarCodeID = part_number.BarCodeID where PartID = ${prodID}";
  $qry = mysqli_query($db, $sql);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <?php 
	include '../global/imports.php'
  ?>
    <meta charset="utf-8">
    <title>Edit Part</title>
  </head>
  <body>

    <h2>Edit Part</h2>
    <form method="post" action="processor.php">


    <table width="60%">
	<tr>
	    <th>
		Quanity
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
		Cores
	    </th>
		<th>
		Clockrate
	    </th>
		<th>
		Socket
	    </th>
		<th>
		Code Name
	    </th>
		<th>
		Part Number
	    </th>
	  </tr>


    <?php
      $rs = mysqli_fetch_array ($qry);
      extract($rs);
	   print "<td><input type='text' value='${Quanity}' name='qty'/></td>
	   <td>
	  	<label>
			<input type='checkbox' class='filled-in' name='new'";

		if($IsNew){
			print " checked";
		}

		print "/>
		<span></span>
	  	</label>
		</td>
		<td>
		<label>
			<input type='checkbox' class='filled-in' name='test'";
  		if($IsTested){
			print " checked";
		}
		print "/>
			<span></span>
  		</label>
	  	</td>
	   <td><input type='text' value ='${Brand}' name='brand' size='6'/></td>
	   <td><input type='text' value='${Model}' name='model'/></td>
	   <td><input type='text' value='${Cores}' name='cores' size='10'/></td>
	   <td><input type='text' value='${ClockRate}' name='rate'/></td>
	   <td><input type='text' value='${Socket}' name='socket' size='10'/></td>
	   <td><input type='text' value='${CodeName}' name='cname'/></td>
	   <td><input type='text' value='${PartNumber}' name='pnum'/></td>";
    ?>
  </table>
  	<input type="submit" value="Save Changes" /><input type="hidden" name="partid" value="<?=$PartID?>">
	<input type="reset" value="Reset">
  </form>
  </body>
</html>
