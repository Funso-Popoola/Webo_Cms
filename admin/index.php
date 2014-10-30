<?php
//session_start();
if((isset($_SESSION['username']) && ($_SESSION['username']) == "admin") && (isset($_SESSION['password']) & ($_SESSION['password']) == "admin")){
	require_once 'settings.php';
} else {
	require_once 'login.php';
}
?>