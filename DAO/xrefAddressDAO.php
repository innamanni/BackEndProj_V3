<?php
	function insert_xref_address($con, $person_id, $address_id) {
		//table & column names
		$table_name = 'xref_address';
		$col_person_id = 'person_id';
		$col_address_id = 'address_id';
		$col_address_type = 'address_type';
		
		$address_type = 'Home';

		$query =  'INSERT INTO ' . $table_name . '(' . $col_person_id . ',' . $col_address_id . ', ' . $col_address_type . ') VALUES (\''. $person_id . '\' ,\'' . $address_id . '\' ,\'' . $address_type . '\');';
		//echo $query . '<br><br>';
		
		mysqli_query($con, $query);
	}
?>