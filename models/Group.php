<?php

namespace passwordManager;

class Group extends \Model {
	public $table = 'groups';

	//Return array of the users in the group array(array(id, name),array(id,name))
	public function getUsers(){
		//$user = array();
		$groupusers = \DB::shift_array ('select user_id from group_users where group_id = ?', $this->id);
		$users = \User::query ('id, name')->where ('id in(' . join (',', $groupusers) . ')')->fetch_orig();
		
		//If there are no users return empty array	
		if($users == '' || $users==false) return array();
		
		return $users;
	}

}

?>
