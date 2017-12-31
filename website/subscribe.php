<?php
	require('utils/lang.php');
	require('action/SubscribeAction.php');
	
	$action = new SubscribeAction();
	$action->execute();


	include("partials/header.php");
?>