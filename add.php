<script src="functions.js"></script>
<?php
/*This page has hardcoded values:
$tableName = 'motherboard';
$partNumber = "XXXXXXX";
*/

include "database.php";
//include "functions.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  extract($_POST);
  $categoryID = get_category_from_tableName($tableName);
  //print $partNumber;
  //1. get the next id number from the bar_code table
  // $sqlBC = "SELECT MAX(BarCodeID) AS bcID FROM bar_code";
  // $qryBC = mysqli_query($db, $sqlBC);
  // $rsBC = mysqli_fetch_array($qryBC);
  $sqlBC = "SHOW TABLE STATUS LIKE 'bar_code'";
  $qryBC = mysqli_query($db, $sqlBC);
  $rsBC = mysqli_fetch_assoc($qryBC);
  $bcID = $rsBC['Auto_increment'];
  
  mysqli_free_result($qryBC);

  //2. ***************Add part to appropriate table and get the generated id**************** //
  $str = "Insert into {$tableName} (";
  foreach ($_POST as $key => $value) {
    if ($key != "tableName" && $key != "partNumber") $str .= $key . ", ";
  }
  $str .= "BarCodeID, CategoryID) VALUES (";
  foreach ($_POST as $key => $value) {
    if ($key != "tableName" && $key != "partNumber" ) $str .= "'$value', ";
    
  }
  $str .= "$bcID, $categoryID)";
  
  $qryPart = mysqli_query($db, $str);
  $partID = mysqli_insert_id($db);
  echo $partID . " partID<br>";
  //******************************* //

  // 3. ***************Generate the Bar Code and add to bar_code table **************** //
  $catID = get_category_from_tableName($tableName); //Not sure if the barcode was here, so added a function to get it from the tableName
  $catIDs = str_pad($catID,4,0, STR_PAD_LEFT);
  $bcID = str_pad($partID, 12,0,STR_PAD_LEFT);
  $newBarCode = $catIDs.$bcID;
  $sqlBC = "INSERT INTO bar_code (BarCode) VALUES ('$newBarCode')";
  
  $qryBC = mysqli_query($db, $sqlBC);
  $BarCodeID = mysqli_insert_id($db);

  //******************************* //

// 4. ***************Add partNumber and barcode to part_number table **************** //
$sqlPartNum = "INSERT INTO part_number (BarCodeID, PartNumber) VALUES ($BarCodeID, '$partNumber')";


$qryPartNum = mysqli_query($db, $sqlPartNum);

  //******************************* //

}
// hardcode in a $tableName

//$tableName = "motherboard";

$sqlColumns = "select *  from $tableName";

$qryColumns = mysqli_query($db, $sqlColumns);
$rsColumns = mysqli_fetch_assoc($qryColumns);


	

	print "<form method='post' id='frmPart'><table>";
    print "<tr>";

    $count = 0;
    foreach ($rsColumns as $key => $value) {
      $dataType = mysqli_fetch_field_direct($qryColumns, $count);
      //don't print if it is a key, or a timestamp field
      if ((strpos($key, "ID")== true) || $dataType->type == 7 ){

      }else {
        print "<td><label for $key>$key</label></td>";
      }
      $count++;
    }
    print "</tr><tr>";
    $count = 0;
    foreach ($rsColumns as $key => $value) {
      $dataType = mysqli_fetch_field_direct($qryColumns, $count);
      $count++;
      if ((strpos($key, "ID")== true) || $dataType->type == 7 ){
        continue;
      } else {
        print "<td><input type='text' id='$key' name='$key'></td>";
      }

    }
    print "</tr>";


    print "</table>";
    print "<input type='text' value='$txtInput' name='partNumber' />";
    print "<input type='text' value='$tableName' name='tableName' />";
    print "<input type='button' name = 'action' onclick='saveChanges()' value='Add Part' />";
print "</form>";

 ?>
