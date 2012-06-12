<?php

namespace passwordManager;

class Password extends \Model {
	public $table = 'passwords';


	//Return array of the users in the group array(array(id, name),array(id,name))
	public function getGroups(){
		//$user = array();
		$passwordgroups = \DB::shift_array ('select group_id from password_groups where password_id = ?', $this->id);
		
		$groups = Group::query ('id, group_name')->where ('id in(' . join (',', $passwordgroups) . ')')->fetch_orig();
		//If there are no users return empty array	
		if($groups == '' || $groups==false) return array();
		
		return $groups;
	}

}

?>
