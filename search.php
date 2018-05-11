<?php
	session_start();
	include "database.php";
	include "functions.php";
	include "global/imports.php";
	if (isset($_GET['side'])){
		if($_GET['side']=="net"){

			//include "global/net-header.php";
			$_SESSION['side'] = "global/net-header.php";

		} else if($_GET['side']=="clinic"){
			//include "global/clinic-header.php";
			$_SESSION['side'] = "global/clinic-header.php";
		}
	}
	if (isset($_POST['action'])){
		extract($_POST);

		if ($action == "save"){
	    $str = "Update {$tblName} SET ";

	    foreach ($_POST as $key => $value) {
	      if($key != "tblName" && $key != "action"){
	        $str .=   "$key = '$value', ";
	      }
	    }
	    $str = substr($str, 0, -2);
	    $str .=    " Where PartID = '{$PartID}'";
	    mysqli_query($db, $str);
		} else if($action == "add"){

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
				//echo $bcID;

			  mysqli_free_result($qryBC);

			  //2. ***************Add part to appropriate table and get the generated id**************** //
			  $str = "Insert into {$tableName} (";
			  foreach ($_POST as $key => $value) {
			    if ($key != "tableName" && $key != "partNumber" && $key != "action") $str .= $key . ", ";
			  }
			  $str .= "BarCodeID, CategoryID) VALUES (";
			  foreach ($_POST as $key => $value) {
			    if ($key != "tableName" && $key != "partNumber"  && $key != "action") $str .= "'$value', ";

			  }
			  $str .= "$bcID, $categoryID)";
				//echo $str;
			  $qryPart = mysqli_query($db, $str);
			  $partID = mysqli_insert_id($db);
			 // echo $partID . " partID<br>";
			  //******************************* //

			  // 3. ***************Generate the Bar Code and add to bar_code table **************** //
			  $catID = get_category_from_tableName($tableName); //Not sure if the barcode was here, so added a function to get it from the tableName
			  $catIDs = str_pad($catID,4,0, STR_PAD_LEFT);
			  $bcID = str_pad($partID, 12,0,STR_PAD_LEFT);
			  $newBarCode = $catIDs.$bcID;
			  $sqlBC = "INSERT INTO bar_code (BarCode) VALUES ('$newBarCode')";
				//echo "<br />$sqlBC";
			  $qryBC = mysqli_query($db, $sqlBC);
			  $BarCodeID = mysqli_insert_id($db);

			  //******************************* //

			// 4. ***************Add partNumber and barcode to part_number table **************** //
			$sqlPartNum = "INSERT INTO part_number (BarCodeID, PartNumber) VALUES ($BarCodeID, '$partNumber')";


			$qryPartNum = mysqli_query($db, $sqlPartNum);

			  //******************************* //

		}

	} else {
		$action = "";
	}

	include $_SESSION['side'];




?>
<script href="script.js"></script>
<script>
//utilize a confirmation window to ensure changes are intended.
	function saveChanges(){
	  blnSave = confirm("Save Changes");
	  if (blnSave){
	    document.getElementById("frmPart").submit();
	  }
	}
	function confirmChanges(){
		ok = confirm("Save Changes?");
		if (ok){
			document.getElementById('frmRemove').submit();
		}
	}

	function resetForm(){
		mode = document.getElementById('mode').value;
		type = document.getElementById('type').value;
		location.replace("search.php?mode=" + mode + "&type=" + type);


	}
	function notFound(){
		part = confirm("No Records Found. OK to add, Cancel to Clear and search again");
		if (part) {
			return;
		} else {
			resetForm();
		}
	}
</script>
<?php



	//Mode will determine what displays on the page.
	//Mode is sent as a get request , query string in the URL
	//The default mode is 'search'
	if (isset($_GET['mode'])) {
		$mode = $_GET['mode'];
	} else {
		$mode = "none";
	}

	if (isset($_GET['txtInput'])) {
		$txtInput = $_GET['txtInput'];
	} else {
		$txtInput = "";
	}

	if ($mode == "doRemove"){
		run_remove_part($_GET['tableName'], $_GET['pid'], $_GET['update']);
		$type= "bSearch";
		if ($_GET['update'] == "s") {
			$mode= "remove";
		} if ($_GET['update'] == "a") {
			$mode= "return";
		}
	}

	//Type will determine the type of search and the page controls.
	//Type is sent as a get request via a query string in the URL
	//The default type is 'pSearch'
	if (isset($_GET['type'])) {
		$type = $_GET['type'];
	} else {
		$type = "pSearch";
	}

	if ($type == "pSearch") {

		//Category is sent as a get request to set the table to be used.
		if (isset($_GET['category'])){
			extract ($_GET);
			$tableName = $category;

		}
	}
	if ($type == "pSearch") {
		echo "<h1>Part Number Search Page</h1>";
	} else if ($type == "bSearch") {
		echo "<h1>Bar Code Search Page</h1>";
	}
?>

<form method="get">
<div class="input-field">
<?php
	//Changes what is displayed depending on the search mode.
	//Loads the category dropdown box.
	$sqlCat = "select * from category";
	$qryCat = mysqli_query($db, $sqlCat);
	if ($type == "pSearch"){
		$placeHolder = "Enter Part Number";
		print ("<select name='category' class='browser-default'>");
		print ("<option ");
		if (!isset($category)){
			print "selected";
		}
		print (" value='none'>Select Category</option>");
		while ($rsCat = mysqli_fetch_array($qryCat)){
			extract($rsCat);
			print ("<option ");
			if (isset($category) && $CategoryName == $category){
				print (" selected ");
			}
			print ("value='{$CategoryName}'>${CategoryName}</option>");
		}
		print "</select>";

	} else if ($type == "bSearch") {
		$placeHolder = "Scan Bar Code";
	}

	print("<input type='text' placeholder='{$placeHolder}' value='{$txtInput}' name='txtInput'/><br>");
	print("<button class='btn waves-effect waves-light' type='submit'>Search</button> &nbsp;");
	print("<input type='button' class='btn waves-effect waves-light' onclick='resetForm()' value='Clear'><br>");
	print("<input type='hidden' id='mode' value='{$mode}' name='mode' class='browser-default'/><br>");
	print("<input type='hidden' id='type' name='type' value='{$type}'/>");
?>
</div>
</form>

<?php
	//Loads table column names and then sends names to a string variable.
	if (isset($tableName) && $category != "none"){

		run_sql_query($tableName);
	}

	//Loads table column names and then sends names to a string variable.
	if ($type == "bSearch" && $txtInput != ""){
		$tableName =  get_table_name($txtInput);
		$partID = get_part_id($txtInput);
		run_sql_query($tableName);

	}

?>

<?php
	//test the clean function
	//echo (clean("%7Ba2# 777"));
?>
