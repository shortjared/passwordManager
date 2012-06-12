<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = i18n_get ('Add Password');

$form = new Form ('post', $this);

echo $form->handle (function ($form) {
	// Create and save a new password
	$password = new passwordManager\Password (array (
		'password_service' => $_POST['password_service'],
		'password_text' => $_POST['password_text']
	));
	$password->put ();

	if ($password->error) {
		// Failed to save
		$form->controller->add_notification (i18n_get ('Unable to save password.'.$password->error));
		return false;
	}

	// Notify the user and redirect on success
	$form->controller->add_notification (i18n_get ('Password added.'));
	$form->controller->redirect ('passwordManager/admin');
});

?>
