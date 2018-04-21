<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Products</title>
    <?php
	  $status = "";
      include "database.php";
      if (isset($_POST['qty'])){
        extract ($_POST);
		//print_r($_POST);
        $sql = $db->prepare("Update processor SET Quanity = ?, IsNew = ?, IsTested = ? ,Brand = ?, Model = ?, Cores = ?, Clockrate = ?, Socket = ?, CodeName = ? WHERE PartID = ?");
        $sql->bind_param("iiississsi", $qty, $isnew, $tested, $brand, $model, $cores, $rate, $socket, $cname, $partid);
        $sql->execute();
		$sql = $db->prepare("Update part_number set PartNumber = ? Where PartNumberID = ?");
		$sql->bind_param("si", $pnum, $partid);
		$sql->execute();
        if (mysqli_affected_rows($db) >= 1){
          $status = "Update was a success";
        }else{
          $status = "Update Not Successful";
        }

      }
     ?>
  </head>
  <body>
    <?php print "${status}";?>
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
      </th><th colspan=-"2">
        Brand
      </th>
	  <th>
		Model
	  </th>
	  <th>
		Cores
	  </th>
	  <th>
		Clock Rate
	  </th>
	  <th>
		Socket
	  </th>
	  <th>
		Code Name
	  </th>
	  <th>
		BarCode
	  </th>
	  <th>
		Part Number
	  </th>
    </tr>


    <?php
        //Display all the processor parts
        $sql = "SELECT PartID, Quanity, IsNew, IsTested, Brand, Model, Cores, ClockRate, Socket, CodeName, BarCode, PartNumber FROM processor join bar_code on processor.BarCodeID = bar_code.BarCodeID join part_number on bar_code.BarCodeID = part_number.BarCodeID";
        $qry = mysqli_query($db, $sql);
        

        while ($rs = mysqli_fetch_array($qry)){
          extract ($rs);
		  print "<tr>";
		  print "<td>${Quanity}</td>";
          print "<td>${IsNew}</td><td>${IsTested}</td><td>${Brand}</td><td>${Model}</td><td>${Cores}</td><td>${ClockRate}</td><td>${Socket}</td><td>${CodeName}</td><td>${BarCode}</td><td>${PartNumber}</td>";
          print "<td><a href='editProcessor.php?prod=${PartID}'>Edit</a></td>";
          print "</tr>";
        }


    ?>
    </table>

  </body>
</html>
