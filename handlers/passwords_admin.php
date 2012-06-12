<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = i18n_get ('Passwords');

// Calculate the offset
$limit = 20;
$num = isset ($this->params[0]) ? $this->params[0] : 1;
$offset = ($num - 1) * $limit;

// Fetch the items and total items
$items = passwordManager\Password::query ()->fetch ($limit, $offset);
$total = passwordManager\Password::query ()->count ();

// Pass our data to the view template
echo $tpl->render (
	'passwordManager/passwords_admin',
	array (
		'limit' => $limit,
		'total' => $total,
		'items' => $items,
		'count' => count ($items),
		'url' => 'passwordManager/passwords_admin/%d'
	)
);

?>
