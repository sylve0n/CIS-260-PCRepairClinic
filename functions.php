
<?php

	function clean_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function clean($string) {
		$string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
		return preg_replace( '/[^0-9]/', '', $string );
	}

	function get_table_name($barcode){
		include "database.php";
		$category = substr ( $barcode , 0, 4 );
		$sql = "select * from category where categoryID = ${category}";
		$qry = mysqli_query($db, $sql);
		$rs = mysqli_fetch_array($qry);
		return $rs['CategoryName'];
	}

	function get_part_id($barcode){
		include "database.php";
		$partID = substr ( $barcode , 4, 12);
		return $partID;
	}

	function get_field_names($tableName){
		include "database.php";
		$fieldNames = "";
		$sqlNames = "SHOW COLUMNS FROM ${tableName}";
		$qryNames = mysqli_query($db, $sqlNames);
		while ($rsNames = mysqli_fetch_array($qryNames)){
			if ($rsNames['Field'] != 'PartID' && $rsNames['Field'] != 'BarCodeID' && $rsNames['Field'] != 'CategoryID' && $rsNames['Field'] != 'TimeStamp'){
				if ($fieldNames == ""){
					$fieldNames = $rsNames['Field'];
				} else {
					$fieldNames = $fieldNames .", " . $rsNames['Field'];
				}
			}
		}
		return $fieldNames;
	}

	function get_sql_statement($fieldNames){
		include "database.php";
		global $tableName, $txtInput, $type;
		$statement = "SELECT $fieldNames, BarCode, PartNumber FROM ${tableName} JOIN bar_code ON ${tableName}.BarCodeID = bar_code.BarCodeID JOIN part_number ON bar_code.BarCodeID = part_number.BarCodeID";
		if ($txtInput != "" && $type == "pSearch"){
			$statement = $statement . " WHERE part_number.PartNumber ='${txtInput}'";
		} else if ($type == "bSearch"){
			$statement = $statement . " WHERE bar_code.BarCode = '${txtInput}'";
		}
		return $statement;
	}

	function run_sql_query($tableName) {
		include "database.php";
		global $mode;
		global $action;

		//Function call to build field names.
		$fieldNames = get_field_names($tableName);
		global $txtInput;

		//Function call to build sql statement.
		$sql = get_sql_statement($fieldNames);
		$result = mysqli_query($db, $sql);
		$rowCount = $result->num_rows;

		if ($rowCount < 1) {
			print ("<script>notFound();</script>");
			//print "No records found.";
				if ($action != "add"){
					include "add.php";
					return;
				}


		} else if ($rowCount == 1 && $mode == "edit"){
			if ($action != "save"){
				include "edit.php";
				return;
			}
		}
		$results = mysqli_query($db, $sql);
		echo "<h2>{$tableName} Search Results</h2>";
		print ("<table class='highlight centered'><thead><tr>");
		while($field = mysqli_fetch_field($results)) {
			print "<th> " . $field->name . "</th>";
		}
		print "</tr></thead>";
		print "<tr>";

		while ($row = mysqli_fetch_assoc($result)){
			foreach ($row as $value){
				print ("<td>" . $value . "</td>");
			}
			print "</tr>";
		}
		print "</table><br />";

		print ("<form method='get' id='frmRemove'>");

		if ($rowCount == 1 ){
			global $partID, $mode;
			print ("<input type='hidden' value='{$tableName}' name='tableName'>");
			print ("<input type='hidden' value='{$partID}' name='pid'>");
			print ("<input type='hidden' value='{$txtInput}' name='txtInput'> ");
			print ("<input type='hidden' name='mode' value='doRemove'>");
			print ("<input type='hidden' name='type' value='bSearch'>");

			if($mode == "remove") {
				print ("<input type='hidden' value='s' name='update'> ");
				print ("<input type='button' class='btn waves-effect waves-light blue-grey' onclick='confirmChanges()' value='Remove'>");
			} else if ($mode == "return") {
				print ("<input type='hidden' value='a' name='update'> ");
				print ("<input type='button' class='btn waves-effect waves-light blue-grey' onclick='confirmChanges()' value='Return'>");
			}
		}
		print ("</form>");

	}

	function run_remove_part($tableName, $pid, $update) {
		include "database.php";
		$sqlQty = "select quanity from ${tableName} where partid = {$pid}";

		$qryQty = mysqli_query($db, $sqlQty);
		$rs = mysqli_fetch_array($qryQty);
		$qty = $rs['quanity'];

		if ($qty > 0){
			if ($update == "s") {
				$sqlUpdate = "Update ${tableName} set quanity = quanity - 1 where partid = ${pid} ";
			} else if ($update == "a") {
				$sqlUpdate = "Update ${tableName} set quanity = quanity + 1 where partid = ${pid} ";
			}
			$qryUpdate = mysqli_query($db, $sqlUpdate);
		} else {
			print "Qty is at ${qty}. No parts in inventory";
		}
	}

	function get_barCode($partID){
	  //returns an array with barcodeid and barcode
	  include "database.php";
	  $sql = "select BarCodeID from part_number where PartNumber = '$partID'";
	  $qry = mysqli_query($db, $sql);
	  $rs = mysqli_fetch_array($qry);
	  $barCodeID = $rs['BarCodeID'];

	  $sql="select BarCode from bar_code where BarCodeID = $barCodeID";
	  $qry = mysqli_query($db, $sql);
	  $rs = mysqli_fetch_array($qry);
	  $aryBarCode = array($barCodeID, $rs['BarCode']);
	  return $aryBarCode;
	}

	function get_category_from_tableName($tableName){
		global $db;
		$sqlCat = "select CategoryID from category where CategoryName = '$tableName'";
		$qryCat = mysqli_query($db, $sqlCat);
		$rsCat = mysqli_fetch_array($qryCat);
		return $rsCat[0];
	}


?>
