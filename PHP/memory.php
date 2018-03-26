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
        $sql = $db->prepare("Update memory SET Quanity = ? WHERE PartID = ?");
        $sql->bind_param("ii", $qty, $partid);
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
		Type
	  </th>
	  <th>
		Rate
	  </th>
	  <th>
		Standard Name
	  </th>
	  <th>
		Module Name
	  </th>
	  <th>
		Is Low Voltage
	  </th>
	  <th>
		Barcode
	  </th>
	  <th>
		Part Number
	  </th>
    </tr>


    <?php
        //Display all the processor parts
        $sql = "SELECT PartID, Quanity, IsNew, IsTested, Brand, Type, Rate, StandardName, ModuleName, IsLowVoltage, BarCode, PartNumber FROM memory join bar_code on memory.BarCodeID = bar_code.BarCodeID join part_number on bar_code.BarCodeID = part_number.BarCodeID";
        $qry = mysqli_query($db, $sql);
        

        while ($rs = mysqli_fetch_array($qry)){
          extract ($rs);
		  print "<tr>";
		  print "<td>${Quanity}</td>";
          print "<td>${IsNew}</td><td>${IsTested}</td><td>${Brand}</td><td>${Type}</td><td>${Rate}</td><td>${StandardName}</td><td>${ModuleName}</td><td>${IsLowVoltage}</td><td>${BarCode}</td><td>${PartNumber}</td>";
          print "<td><a href='editPart.php?prod=${PartID}'>Edit</a></td>";
          print "</tr>";
        }


    ?>
    </table>

  </body>
</html>
