<?php
	function insertEmail($con, $person_id) {
			//table & column names
			$table_name = 'email';
			$col_email_address = 'email_address';
			$col_person_id = 'person_id';
			
			$email_address = $_POST['parentEmail'];

			$query =  'INSERT INTO ' . $table_name . '(' . $col_email_address . ',' . $col_person_id .') VALUES (\''. $email_address . '\' ,\'' . $person_id . '\');';
			//echo $query . '<br><br>';
			
			mysqli_query($con, $query);
			$address_id = mysqli_insert_id( $con );
			
			return $email_id;
		}
?>