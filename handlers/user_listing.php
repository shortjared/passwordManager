<?php

$this->require_admin ();
$page->layout = false;

$query = $_GET['query'];
$return['query'] = $query;
$user_array = '';
$data = '';


$users = User::query ()->where('name like "%'.$query.'%"')->fetch_orig();
foreach($users as $user)
{
	$user_array[] = $user->name;
	$data[] = array($user->id);
}

$return['suggestions'] = $user_array;
$return['data'] = $data;

header ('Content-Type: application/json');
echo json_encode($return);


?>
