<?php
	session_start();
	$database_username = 'dev_back';
	$database_password = 'Senac2017';
	$pdo_conn = new PDO( 'mysql:host=pisoavalia.cvoenmmd48mt.us-east-2.rds.amazonaws.com;dbname=PI_oficial', $database_username, $database_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
?>