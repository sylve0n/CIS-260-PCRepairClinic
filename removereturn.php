<?php
	// if ($rowCount == 1 ){
		// print("<a href='?category={$tableName}&pid={$PartID}&part={$part}'>Remove</a>");
	// }

	
	
	
	
	
	
	
	
			//If there a partID exists, decrement the quanity by one.
			if (isset($pid)){
				$sqlQty = "select quanity from ${tableName} where partid = {$pid}";

				$qryQty = mysqli_query($db, $sqlQty);
				$rs = mysqli_fetch_array($qryQty);
				$qty = $rs['quanity'];

				if ($qty > 0){
					$sqlUpdate = "Update ${tableName} set quanity = quanity -1 where partid = ${pid} ";

					$qryUpdate = mysqli_query($db, $sqlUpdate);
				} else {
					print "Qty is at ${qty}. No parts in inventory";
				}
			}

?>