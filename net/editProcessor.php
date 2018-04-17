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
  	<?php include "../global/imports.php"; ?>
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
  </table>
  <?php
      $rs = mysqli_fetch_array ($qry);
	  extract($rs);
	  
	  print "
  		<input type='text' value='${Quanity}'>
	  ";
	  
	//  print  "<span><input type='text' value='${Quanity}' name='qty'/></span>
	//  	<span><label><input type='checkbox' name='isnew' id='isnew'/></label></span>
	// 	<span><label><input type='checkbox' name='tested' id='istested'/></label></span>
	// 	<span><input type='text' value ='${Brand}' name='brand'/></span>
	// 	<span><input type='text' value='${Model}' name='type'/></span>
	// 	<span><input type='text' value='${Cores}' name='rate'/></span>
	// 	<span><input type='text' value='${ClockRate}' name='mname'/></span>
	// 	<span><input type='text' value='${Socket}' name='socket'/></span>
	// 	<span><input type='text' value='${CodeName}' name='cname'/></span>
	// 	<span><input type='text' value='${PartNumber}' name='pnum'/></span>";

    ?>
  <input type="submit" value="Save Changes" /><input type="hidden" name="partid" value="<?=$PartID?>">
  </form>
  </body>
</html>
