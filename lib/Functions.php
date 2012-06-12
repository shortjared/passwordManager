<?php

function getUserPasswords($user_id){

	$usergroups = \DB::shift_array ('select group_id from group_users where user_id = ?', $user_id);
	

	if($usergroups == false || $usergroups == NULL)
		return array();

	
	$grouppasswords = \DB::shift_array ('select password_id from password_groups where group_id in ('. join(',', $usergroups) .')');

	$passwords = passwordManager\Password::query ()->where ('id in(' . join (',', $grouppasswords) . ')')->order('password_text DESC')->fetch_orig();


	//If there were no result return an empty array
	if($passwords == false || $passwords == NULL)
		return array();
	else
		return $passwords;

}


?>
