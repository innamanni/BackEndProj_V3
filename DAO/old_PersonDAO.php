<?php
	function insertPerson($con) {
			include './db/StudentDAO.php';
			include './db/ParentDAO.php';
			
			$parent_f_name = $_POST['parentFirstName'];
			$parent_l_name = $_POST['parentLastName'];
			
			$person_ids = array();
			
			//insert parent
			$parent_person_id = insertParent($con, $parent_f_name, $parent_l_name);
			$person_ids[] = $parent_person_id;
			
			//determine number of Students
			$numOfStudets = $_POST['NumOfTix'];		
            $studentIndex = 1;	
			
			//insert student(s)			
			while ($numOfStudets > 0) {
				$student_person_id = insertStudent($con, $studentIndex);
				$person_ids[] = $student_person_id;
				
				$studentIndex++;
				$numOfStudets = $numOfStudets - 1;
			}
			
			return $person_ids;
		}

?>