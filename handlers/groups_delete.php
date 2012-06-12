<?php

$this->require_admin ();

$group = new passwordManager\Group;
$group->remove ($_GET['id']);

if ($group->error) {
	$this->add_notification (i18n_get ('Unable to delete group.'));
	$this->redirect ('/passwordManager/groups_admin');
}

$this->add_notification (i18n_get ('Group deleted.'));
$this->redirect ('/passwordManager/groups_admin');

?>
