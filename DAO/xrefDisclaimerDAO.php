<?php
	function insert_xref_disclaimer($con, $guardian_id) {
			//table & column names
			$table_name = 'xref_disclaimer';
			$col_date = 'date';
			$col_guardian_id = 'guardian_id';
			$col_disclaimer_id = 'disclaimer_id';
			
			$date = date('Y-m-d');
			$disclaimer_id = 1;
			

			$query =  'INSERT INTO ' . $table_name . '(' . $col_date . ',' . $col_guardian_id . ', ' . $col_disclaimer_id . ') VALUES (\''. $date . '\' ,\'' . $guardian_id . '\' ,\'' . $disclaimer_id . '\');';
			//echo $query . '<br><br>';
			
			mysqli_query($con, $query);
		}
?>