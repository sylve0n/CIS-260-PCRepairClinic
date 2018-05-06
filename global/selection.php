<?php include "imports.php"; ?>
<form method="post" action="index.php">
	<h3 class="center-align">Search For Parts</h3>
	<h5 class="center-align">Select a Category:</h5>
	<div class="input-field">
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
		<button type="submit" name="action" value="submit" class="waves-effect waves-light btn btn-large cyan darken-2">Submit</button>	
	</div>
</form>
<script src="script.js"></script>