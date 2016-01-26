<?php
	function insertParent($con) {	
			
			//table & column names
			$person_table = 'person';
			$col_person_type = 'person_type';
			$col_f_name = 'f_name';
			$col_l_name = 'l_name';
			
			$parent_f_name = $_POST['parentFirstName'];
			$parent_l_name = $_POST['parentLastName'];
			
			$query =  'INSERT INTO '. $person_table . ' ('. $col_person_type . ',' . $col_f_name . ',' . $col_l_name . ') VALUES (\'Parent\' ,\'' . $parent_f_name . '\', \'' . $parent_l_name . '\' );';
			//echo $query . '<br><br>';
			
			mysqli_query($con, $query);
			
			$parent_person_id = mysqli_insert_id( $con );	

			return $parent_person_id;
		}

?>