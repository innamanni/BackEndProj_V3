<?php
require_once '../DAO/BaseDAO.php';
class StateDAO extends BaseDAO {
	public static function getStateDTO($state_id, $state_abbr, $state_descr){
		$tempStateDTO = new StateDTO($state_id, $state_abbr, $state_descr);
		return $tempStateDTO;
	}
	public static function readStateList($con)
	{
		$stateList = array();
		$sql = "select * from state";
		foreach ($con->query($sql) as $row)
		{
			$state_id = $row['state_id'];
			$state_abbr = $row['abbr'];
			$state_descr = $row['descr'];
			$tempStateDTO = new StateDTO($state_id, $state_abbr, $state_descr);
			$stateList[count($stateList)] = $tempStateDTO;
		}
		return $stateList;
	}
	function createState($con, $state_abbr)
	{
		$sql = "select state_id from state where abbr = \"" . $state_abbr . "\"";
		$state_id = $con->query($sql);
		return $state_id;
	}
}
?>
