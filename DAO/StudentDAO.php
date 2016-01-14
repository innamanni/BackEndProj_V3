<?php
	function insertStudent($con, $studentIndex) {
			
			//table & columns
			$person_table = 'person';
			$col_person_type = 'person_type';
			$col_f_name = 'f_name';
			$col_l_name = 'l_name';
			$col_age = 'age';
			$col_grade = 'grade';
			$col_gender = 'gender';
			
			//insert Student
			$name_str = 'studentName' . $studentIndex;
			$age_str = 'age' . $studentIndex;
			$grade_str = 'Grade' . $studentIndex;
			$gender_str = 'studentGender' . $studentIndex;
			
			$student_name = $_POST[$name_str];
			$age = $_POST[$age_str];
			$grade = $_POST[$grade_str];
			$gender = $_POST[$gender_str];
			
			$f_name = ucfirst(strtok($student_name, ' '));
			$l_name = ucfirst(strtok(' '));
			
			$query =  'INSERT INTO '. $person_table . ' ('. $col_person_type . ',' . $col_f_name . ',' . $col_l_name . ',' . $col_age . ',' . $col_grade . ',' . $col_gender . ') VALUES (\'Student\' ,\'' . $f_name . '\', \'' . $l_name . '\', ' . $age . ', ' . $grade . ', \'' . $gender . '\' );';
			//echo $query . '<br><br>';
			
			mysqli_query($con, $query);
						 
			$studen_person_id = mysqli_insert_id( $con );	
			
			return $studen_person_id;
	}

?>