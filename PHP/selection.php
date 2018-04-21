<form method="post" action="index.php">
<select name ="categories">
<option>Select Category</option>

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
	<select name="choices">
	  <option>Search Method</option>
	  <option value="parts1" name="parts1">Part Number</option>
	  <option value="parts2" name="parts2">Barcode</option>
	</select>
	<input type="text" name="barcodes"/>
	<input type="submit" value="submit"/>	
</form>
