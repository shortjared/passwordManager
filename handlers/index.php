<?php

$page->title = 'Passwords';

$this->require_login ();
require_once ('apps/passwordManager/lib/Functions.php');
$u = User::$user;

if($appconf['Settings']['use_masterpass']==false)
{
	echo "No password required";
	echo $tpl->render ('passwordManager/index', array ('valid'=>false,));
	return;
}
else if(!isset($_POST['password']))
{
	echo $tpl->render ('passwordManager/index', array ('valid'=>false,));
	return;
}
else if($_POST['password'] == $appconf['Settings']['masterpass'])
{
	echo $tpl->render ('passwordManager/index', array ('valid'=>true,'passwords'=>getUserPasswords($u->id)));
	return;
}
else
{
	echo '<div style="display:block;text-align:center;color:white;font-size:20px;background:#A80000 " class="password-failure">Incorrect Password!</div>';
	echo $tpl->render ('passwordManager/index', array ('valid'=>false,));
	return;
}

?>
