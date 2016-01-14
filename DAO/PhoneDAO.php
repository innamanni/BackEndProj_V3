<?php
	function insertPhone($con, $person_id) {
			//table & column names
			$table_name = 'phone';
			$col_phone = 'phone_number';
			$col_person_id = 'person_id';
			
			$phone = $_POST['parentCell'];

			$query =  'INSERT INTO ' . $table_name . '(' . $col_phone . ',' . $col_person_id .') VALUES (\''. $phone . '\' ,\'' . $person_id . '\');';
			//echo $query . '<br><br>';
			
			mysqli_query($con, $query);
			$phone_id = mysqli_insert_id( $con );
			
			return $phone_id;
		}
?>