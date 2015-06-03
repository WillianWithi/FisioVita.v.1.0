<?php
	session_start();
	include('php/login.php');
	unset($_SESSION['email']);
	redirect('index.php');
?>