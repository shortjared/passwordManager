<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = i18n_get ('Groups');

// Calculate the offset
$limit = 20;
$num = isset ($this->params[0]) ? $this->params[0] : 1;
$offset = ($num - 1) * $limit;

// Fetch the items and total items
$items = passwordManager\Group::query ()->fetch ($limit, $offset);
$total = passwordManager\Group::query ()->count ();

foreach($items as $item)
{
	foreach($item->getUsers() as $user)
	{
		$item->group_users .= ', ' . $user->name; 
	}
	$item->group_users = substr($item->group_users,1);
}


// Pass our data to the view template
echo $tpl->render (
	'passwordManager/groups_admin',
	array (
		'limit' => $limit,
		'total' => $total,
		'items' => $items,
		'count' => count ($items),
		'url' => '/passwordManager/groups_admin/%d'
	)
);
?>
