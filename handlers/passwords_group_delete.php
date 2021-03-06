<?php
$this->require_admin ();

$res = passwordManager\Password_group::query ()
    ->where ('password_id', $_GET['password_id'])
    ->where ('group_id', $_GET['group_id'])
    ->fetch (0,0); // limit, offset

foreach ($res as $row) {
    $row->remove ();
}


if ($res->error) {
	$this->add_notification (i18n_get ('Unable to remove group.'));
	$this->redirect ('/passwordManager/passwords_edit?id='.$_GET['password_id']);
}

$this->add_notification (i18n_get ('Group removed.'));
$this->redirect ('/passwordManager/passwords_edit?id='.$_GET['password_id']);
?>
