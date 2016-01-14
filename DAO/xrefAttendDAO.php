<?php
	function insert_xref_attend($con, $person_id, $event_id) {
			//table & column names
			$table_name = 'xref_attend';
			$col_person_id = 'person_id';
			$col_event_id = 'event_id';

			$query =  'INSERT INTO ' . $table_name . '(' . $col_person_id . ',' . $col_event_id . ') VALUES (\''. $person_id . '\' ,\'' . $event_id . '\');';
			//echo $query . '<br><br>';
			
			mysqli_query($con, $query);
		}
?>