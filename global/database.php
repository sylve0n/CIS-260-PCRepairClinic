<?php
  $usrName = "root";
  $passWord = "toor";
  #$db = mysqli_connect("localhost", $usrName, $passWord, 'inventory');
  $db = new mysqli("localhost", $usrName, $passWord, 'inventory');

 $connection_error = mysqli_connect_error();
  if ($connection_error != null){
      echo "<p> error connecting: $connection_error</p>";
  } else {
      //echo "Good to Go!!!";
  }
?>
