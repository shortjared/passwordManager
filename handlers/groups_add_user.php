<?php

$this->require_admin ();

$page->layout = false;

$form = new Form ('post', $this);
$form->verify_csrf = false;

echo $form->handle (function ($form) {
	// Update the group
	$group = new passwordManager\Group_user (array (
		'group_id' => $_POST['group_id'],
		'user_id' => $_POST['user_id']
	));
	$group->put ();

	if ($group_user->error) {
		// Failed to save
		$form->controller->add_notification (i18n_get ('Unable to add user.'));
		return false;
	}


	// Notify the user and redirect on success
	$form->controller->add_notification (i18n_get ('User Added.'));
	$form->controller->redirect ('/passwordManager/groups_admin');
});

?>
