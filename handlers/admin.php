<?php

$this->require_admin ();

$page->layout = 'admin';
$page->title = 'PasswordManager';

echo $tpl->render ('passwordManager/admin', array ());

?>
