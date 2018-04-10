<form method="post" action="index.php">
<select name ="categories">
<option>Select Item</option>
<div class="input-field">
	<?php
			include "database.php";
			include "../imports.php";
				$sql = "select * from category";
				$qry = mysqli_query($db, $sql);
			
			while ($rs = mysqli_fetch_array($qry)){
				extract ($rs);
				print "<option value=${CategoryID}>${CategoryName}</option>";
			}
	?>	
		</select>
		<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    	<i class="material-icons right">search</i>
  	</button>
	</div>
</form>