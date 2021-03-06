<?php

$this->require_admin ();

$page->layout = false;

$form = new Form ('post', $this);
$form->verify_csrf = false;


$form->data['groups'] = passwordManager\Group::query ()->fetch (0,0);

echo $form->handle (function ($form) {
	// Update the group
	unset($form->data['groups']);	
	
	$passwordgroup = new passwordManager\Password_group (array (
		'group_id' => $_POST['group_id'],
		'password_id' => $_POST['password_id']
	));
	
	$passwordgroup->put ();

	if ($passwordgroup->error) {
		// Failed to save
		$form->controller->add_notification (i18n_get ('Unable to add group.'));
		return false;
	}


	// Notify the user and redirect on success
	$form->controller->add_notification (i18n_get ('Group Added.'));
	$form->controller->redirect ('/passwordManager/passwords_edit_?id='.$_POST['password_id']);
});

?>
