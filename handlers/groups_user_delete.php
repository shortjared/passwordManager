<?php
$this->require_admin ();

$res = passwordManager\Group_user::query ()
    ->where ('user_id', $_GET['user_id'])
    ->where ('group_id', $_GET['group_id'])
    ->fetch (0,0); // limit, offset

foreach ($res as $row) {
    $row->remove ();
}


if ($res->error) {
	$this->add_notification (i18n_get ('Unable to remove user.'));
	$this->redirect ('/passwordManager/groups_edit?id='.$_GET['group_id']);
}

$this->add_notification (i18n_get ('User removed.'));
$this->redirect ('/passwordManager/groups_edit?id='.$_GET['group_id']);
?>
