<?php
  /*if (!isset($_GET['prod'])){
    header('Location: processor.php');
  }*/
  include "database.php";
  $test = $_REQUEST['pnum'];
  //insert sattement
  /*$sql = "Insert Into part_number (BarCodeID, PartNumber) values($test, '$test')";*/
  print $sql;
  $qry = mysqli_query($db, $sql);
  $lastRecord = mysqli_insert_id($db);
  print $lastRecord;
  
  //find last record
  //SELECT * FROM `bar_code` ORDER BY BarCodeID DESC LIMIT 1
 ?>
 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Part</title>
  </head>
  <body>

    <h2>Add Part</h2>
    <form method="post" action="addProcessor.php">


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
      /*$rs = mysqli_fetch_array ($qry);
      extract($rs);*/
	   print "<td><input type='text' value='${Quanity}' name='qty'/></td><td><input type='text' value='${IsNew}' name='isnew' size='1'/></td><td><input type='text' value='${IsTested}' name='tested' size='1'/></td>
	   <td><input type='text' value ='${Brand}' name='brand' size='6'/></td><td><input type='text' value='${Model}' name='model'/></td><td><input type='text' value='${Cores}' name='cores' size='10'/></td>
	  <td><input type='text' value='${ClockRate}' name='rate'/></td><td><input type='text' value='${Socket}' name='socket' size='10'/></td><td><input type='text' value='${CodeName}' name='cname'/></td><td><input type='text' value='${PartNumber}' name='pnum'/></td>";




    ?>
  </table>
  <input type="submit" value="Save Changes" /><input type="hidden" name="partid" value="<?=$PartID?>">
  </form>
  </body>
</html>