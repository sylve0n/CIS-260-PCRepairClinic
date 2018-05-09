<?php
	include "database.php";
	include "functions.php";
	include "global/imports.php";

	if($_GET['side']=="net"){
		include "global/net-header.php";

	} else if($_GET['side']=="clinic"){
		include "global/clinic-header.php";
	}
	
?>
<script href="script.js"></script>
<!-- <script>
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
</script> -->
<?php
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
	    mysqli_query($db, $str);
	    

	    //display the updated database
	    $sql = "select * from $tblName";
	    $qry = mysqli_query($db, $sql);
	    $rs = mysqli_fetch_assoc($qry);
	    foreach ($rs as $key => $value) {
		 echo $key . ": " . $value . "<br />";
	    }
	  }

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
	print("<button class='btn waves-effect waves-light' type='submit'>Search</button><br>");
	print("<input type='text' value='{$mode}' name='mode' class='browser-default'/><br>");
	print("<input type='input' name='type' value='{$type}'/>");
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
