
<?php


  //check to see if the form was posted
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    extract($_POST);

    $str = "Update {$tblName} SET ";

    foreach ($_POST as $key => $value) {
      if($key != "tblName"){
        $str .=   "$key = '$value', ";
      }
    }
    $str = substr($str, 0, -2);
    $str .=    " Where PartID = '{$PartID}'";
    mysqli_query($db, $str);
    echo $str;
    //
    // //display the updated database
    // $sql = "select * from $tblName";
    // $qry = mysqli_query($db, $sql);
    // $rs = mysqli_fetch_assoc($qry);
    // foreach ($rs as $key => $value) {
    //   echo $key . ": " . $value . "<br />";
    // }
  }

  global $txtInput;
  //global $partID;
  global $db;

  $part = $txtInput;

  //get the barCode
  $sql = "select BarCodeID from part_number where PartNumber = '$txtInput'";
  $qry = mysqli_query($db, $sql);
  $rs = mysqli_fetch_array($qry);
  $barCodeID = $rs['BarCodeID'];

  $sql="select BarCode from bar_code where BarCodeID = $barCodeID";
  $qry = mysqli_query($db, $sql);
  $rs = mysqli_fetch_array($qry);
  $aryBarCode = array($barCodeID, $rs['BarCode']);
  $barCode = get_barCode($part);
  $tableName = get_table_name($barCode[1]);

  $strFieldNames = get_field_names($tableName);
  $aryFieldNames = explode(',', $strFieldNames);
  $strFieldVals = $strFieldNames . ",PartID";

  $sql = "Select $strFieldVals from $tableName where BarCodeID = '$barCode[0]'";
  $query = mysqli_query($db, $sql);
  $rsPart = mysqli_fetch_assoc($query);
  ?>
  <h2><?php echo "Edit $txtInput"?></h2>
  <form method="post" id="frmPart">


  <?php
  //$count=0;



  print ("<table><tr>");
  foreach ($aryFieldNames as $field) {
    print("<th>$field</th>");
  }

  print ("</tr><tr>");

  foreach ($rsPart as $key => $value) {
      //get to see if the field data types 1 is tinyint and 7 is timestamp
      //$dataType = mysqli_fetch_field_direct($query, $count);

      // //don't print the label if it is a key, or a timestamp field
      // if ((strpos($key, "ID")== true) || $dataType->type == 7 ){
      // } else {
      //     print("<label for='{$key}'>{$key}</label>");
      // }

      // if ($dataType->type == 1){
      //   print ("<input type='checkbox' name='$key' value='1' id='$key'");
      //   if ($value == 1) echo ' checked';
      //   print "><br />";
      // } else {
        if ($key == "PartID"){

        } else {
          print("<td class='addBox'><input id='{$key}' type='text' name='$key' value='$value' class='browser-default'/></td>");
        }

    //}
  //  $count++;
  }
  print ("</tr></table><br />");
 ?>
 <input type="hidden" value="<?php echo $tableName?>" name="tblName">
 <input type="hidden" value="<?php echo $rsPart['PartID']?>" name="PartID">
 <input type="hidden" value="save" name="action" />
 <input type="button" class="btn waves-effect waves-light" value="Save" onclick="saveChanges()"/> 
  </form>
