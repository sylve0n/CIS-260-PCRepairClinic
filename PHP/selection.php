<form method="post" action="index.php">
<select name ="categories">
<option>Select Item</option>

<?php
		include "database.php";
		  $sql = "select * from category";
		  $qry = mysqli_query($db, $sql);
		
		while ($rs = mysqli_fetch_array($qry)){
			extract ($rs);
			print "<option value=${CategoryID}>${CategoryName}</option>";
		}
?>	
	</select>
	<input type="submit" value="submit"/>	
</form>