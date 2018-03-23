
<!DOCTYPE html>
<html lang="en">
<head>

<?php
			$selection = "";
			if (isset($_POST['categories'])){
				//echo ("true");
				$selection = $_POST['categories'];
				
			}
		
		?>
	
	<?php
		include "database.php";
		$sql = "select * from category";
		$qry = mysqli_query($db, $sql);
		
		$rs = mysqli_fetch_array($qry);
		switch($selection){
			case "":
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

</body>
</html>
