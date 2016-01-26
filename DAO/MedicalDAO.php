<?php
	function insertMedical($con, $parent_id, $student_id) {
			//table & column names
			$table_name = 'medical';
			$col_medical_description = 'medical_description';
			$col_permission = 'permission';
			$col_student_id = 'student_id';
			$col_parent_id = 'parent_id';
			
			$medical_description = $_POST['MedIssues'];
			$permission = $_POST['MedSignature'];

			$query =  'INSERT INTO ' . $table_name . '(' . $col_medical_description . ',' . $col_permission. ', ' . $col_student_id . ', ' . $col_parent_id .') VALUES (\''. $medical_description . '\' ,\'' . $permission . '\' ,\'' . $student_id . '\' ,\'' . $parent_id . '\');';
			//echo $query . '<br><br>';
			
			mysqli_query($con, $query);
			$medical_id = mysqli_insert_id( $con );
			
			return $medical_id;
		}
?>