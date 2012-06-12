<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = i18n_get ('Add Group');

$form = new Form ('post', $this);

echo $form->handle (function ($form) {
	// Create and save a new group
	$group = new passwordManager\Group (array (
		'group_name' => $_POST['group_name']
	));
	$group->put ();

	if ($group->error) {
		// Failed to save
		$form->controller->add_notification (i18n_get ('Unable to save group.'));
		return false;
	}


	// Notify the user and redirect on success
	$form->controller->add_notification (i18n_get ('Group added.'));
	$form->controller->redirect ('/passwordManager/groups_admin');
});

?>
