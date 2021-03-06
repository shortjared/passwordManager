<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = i18n_get ('Edit Password');

$form = new Form ('post', $this);

$password = new passwordManager\Password ($_GET['id']);

$form->data = $password;
$form->data->groups = $password->getGroups();

echo $form->handle (function ($form) {
	// Update the password
	$password = $form->data;
	$password->password_service = $_POST['password_service'];
	$password->password_text = $_POST['password_text'];	
	unset($data['groups']);
	
	$password->put ();

	if ($password->error) {
		// Failed to save
		$form->controller->add_notification (i18n_get ('Unable to save password.'));
		return false;
	}


	// Notify the user and redirect on success
	$form->controller->add_notification (i18n_get ('Password saved.'));
	$form->controller->redirect ('passwordManager/passwords_admin');
});

?>
