<?php
	function insertTransportation($con, $driver_id, $passenger_id, $event_id) {
			//table & column names
			$table_name = 'transportation';
			$col_event_id = 'event_id';
			$col_driver_id = 'driver_id';
			$col_passenger_id = 'passenger_id';
			
			$driver_id = $driver_id;
			$passenger_id = $passenger_id;

			$query =  'INSERT INTO ' . $table_name . '(' . $col_passenger_id . ',' . $col_driver_id . ', ' . $col_event_id . ') VALUES (\''. $passenger_id . '\' ,\'' . $driver_id . '\' ,\'' . $event_id . '\');';
			//echo $query . '<br><br>';
			
			mysqli_query($con, $query);
			$transportation_id = mysqli_insert_id( $con );
			
			return $transportation_id;
		}
?>