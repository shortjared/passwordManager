<?php

$this->require_admin ();

$password = new passwordManager\Password;
$password->remove ($_GET['id']);

if ($password->error) {
	$this->add_notification (i18n_get ('Unable to delete password.'));
	$this->redirect ('/passwords/admin');
}

$this->add_notification (i18n_get ('Password deleted.'));
$this->redirect ('passwordManager/passwords_admin');

?>
