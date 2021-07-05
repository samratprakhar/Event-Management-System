<?php
require_once 'utils/functions.php';
require_once 'classes/User.php';

start_session();

if (!user_logged_in()) {
    header("Location: index.php");
}
else {
	unset($_SESSION['user']);
	
	header("Location: index.php");
}
?>
