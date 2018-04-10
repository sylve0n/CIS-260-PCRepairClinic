
<!DOCTYPE html>
<html lang="en">
<head>

<?php
	include "clinic-header.php";
	$selection = "";
	if (isset($_POST['categories'])){
		//echo ("true");
		$selection = $_POST['categories'];
		
	}
		
?>
	
	<?php
		include "imports.php";
		include "database.php";
		$sql = "select * from category";
		$qry = mysqli_query($db, $sql);
		
		$rs = mysqli_fetch_array($qry);
		switch($selection){
			case "":
			include "selection.php";
			break;

			case "0":
			include "selection.php";
			break;
			
			case "1":
			include "motherboard.php";
			break;
			 
			case "2":
			include "processor.php";
			break;
			
			case "3":
			include "memory.php";
			break;
			
		}
	?>
		
		
</head>
<body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="script.js"></script>
</body>
</html>
