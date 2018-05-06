<script src="functions.js"></script>
<?php
include "database.php";
include "functions.php";

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
    $str .=    " Where PartID = '{$_POST['PartID']}'";
    //mysqli_query($db, $str);
    echo $str;

    //display the updated database
    $sql = "select * from $tblName";
    $qry = mysqli_query($db, $sql);
    $rs = mysqli_fetch_assoc($qry);
    foreach ($rs as $key => $value) {
      echo $key . ": " . $value . "<br />";
    }
  }



  $part = "SL9XN";

  $barCode = get_barCode($part);
  $tableName = get_table_name($barCode[1]);

  $sql = "Select * from $tableName where BarCodeID = '$barCode[0]'";
  $query = mysqli_query($db, $sql);


  $rsPart = mysqli_fetch_assoc($query);
  ?>
  <h1><?php echo $tableName?></h1>
  <form method="post" id="frmPart">


  <?php
  $count=0;
  foreach ($rsPart as $key => $value) {
      //get to see if the field data types 1 is tinyint and 7 is timestamp
      $dataType = mysqli_fetch_field_direct($query, $count);

      //don't print the label if it is a key, or a timestamp field
      if ((strpos($key, "ID")== true) || $dataType->type == 7 ){
      } else {
          print("<label for='{$key}'>{$key}</label>");
      }

      if ($dataType->type == 1){
        print ("<input type='checkbox' name='$key' value='1' id='$key'");
        if ($value == 1) echo ' checked';
        print "><br />";
      } else {
        print("<input id='{$key}' ");
        if ((strpos($key, "ID")== true) || $dataType->type == 7 ){
          //store the data so it is available but hides it from page view
          print ("type='hidden'");
        } else {
          print ("type='text'");
        }
        print (" name='$key' value='$value'/>");
        print ("<br />");
    }
    $count++;
  }

 ?>
 <input type="text" value="<?php echo $tableName?>" name="tblName">
 <input type="button" value="Save The Changes" onclick="saveChanges()"/>
  </form>
