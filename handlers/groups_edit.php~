<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = i18n_get ('Edit Group');

$form = new Form ('post', $this);

$group = new passwordManager\Group ($_GET['id']);
$form->data = $group;
$form->data->users = $group->getUsers();



echo $form->handle (function ($form) {
	// Update the group
	$group = $form->data;
	$group->group_name = $_POST['group_name'];
	unset($group->data['users']);
	$group->put ();

	if ($group->error) {
		// Failed to save
		$form->controller->add_notification (i18n_get ('Unable to save group.'.$group->error));
		return false;
	}


	// Notify the user and redirect on success
	$form->controller->add_notification (i18n_get ('Group saved.'));
	$form->controller->redirect ('/passwordManager/groups_admin');
});

?>
