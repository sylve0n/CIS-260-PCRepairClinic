<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Products</title>
    <?php
	  $status = "";
      include "../global/database.php";
      if (isset($_POST['qty'])){
        extract ($_POST);
        $sql = $db->prepare("Update motherboard SET Quanity = ?, IsNew = ?, IsTested = ?, Brand = ?, Model = ?, FormFactor = ?, CpuBrand = ?, Socket = ?, Chipset = ?, BarCode = ?, PartNumber = ? WHERE PartID = ?");
        $sql->bind_param("iiissssssisi", $qty, $new, $test, $brand, $model, $factor, $cpu, $socket, $chipset, $barcode, $partnumber, $partid);
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
		Revision
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
		BarCode
	  </th>
	  <th>
		Part Number
	  </th>
    </tr>


    <?php
        //Display all the processor parts
        $sql = "SELECT PartID, Quanity, IsNew, IsTested, Brand, Model, Revision, FormFactor, CpuBrand, Socket, Chipset, BarCode, PartNumber FROM motherboard join bar_code on motherboard.BarCodeID = bar_code.BarCodeID join part_number on bar_code.BarCodeID = part_number.BarCodeID";
        $qry = mysqli_query($db, $sql);
        

        while ($rs = mysqli_fetch_array($qry)){
          extract ($rs);
		  print "<tr>";
		  print "<td>${Quanity}</td>";
          print "<td>${IsNew}</td><td>${IsTested}</td><td>${Brand}</td><td>${Model}</td><td>${Revision}</td><td>${FormFactor}</td><td>${CpuBrand}</td><td>${Socket}</td><td>${Chipset}</td><td>${BarCode}</td><td>${PartNumber}</td>";
          print "<td><a href='editMotherBoard.php?prod=${PartID}'>Edit</a></td>";
          print "</tr>";
        }


    ?>
    </table>

  </body>
</html>
