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
        $sql = $db->prepare("Update processor SET Quanity = ? IsNew, = ? IsTested, = ? Brand, = ? Model, = ?, Cores = ?, ClockRate = ?, Socket = ?, CodeName = ?, PartNumber = ? WHERE PartID = ?");
        $sql->bind_param("iiississssi", $qty, $isnew, $tested, $brand, $model, $cores, $clockrate, $socket, $cname, $pnum, $partid);
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
         $barcodes = "";
		 $choices = "";
		 $parts1 = "";
		if ($choices = $parts1){
        $sql = "SELECT PartID, Quanity, IsNew, IsTested, Brand, Model, Revision, FormFactor, CpuBrand, Socket, Chipset, BarCode, PartNumber FROM processor join bar_code on processor.BarCodeID = bar_code.BarCodeID join part_number on bar_code.BarCodeID = part_number.BarCodeID WHERE BarCode = ${barcodes}";
        
		}
		else{
		$sql = "SELECT PartID, Quanity, IsNew, IsTested, Brand, Model, Revision, FormFactor, CpuBrand, Socket, Chipset, BarCode, PartNumber FROM processor join bar_code on processor.BarCodeID = bar_code.BarCodeID join part_number on bar_code.BarCodeID = part_number.BarCodeID WHERE PartNumber = ${barcodes} ";
		}$qry = mysqli_query($db, $sql);
        

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
