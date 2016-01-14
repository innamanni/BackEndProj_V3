<?php
	function insert_xref_guardian($con, $student_id, $parents_id) {
			//table & column names
			$table_name = 'xref_guardian';
			$col_student_id = 'student_id';
			$col_parents_id = 'parents_id';

			$query =  'INSERT INTO ' . $table_name . '(' . $col_student_id . ',' . $col_parents_id . ') VALUES (\''. $student_id . '\' ,\'' . $parents_id . '\');';
			//echo $query . '<br><br>';
			
			mysqli_query($con, $query);
		}
?>