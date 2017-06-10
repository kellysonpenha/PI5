<?php
	require_once "../db.php";
	session_start();
	function protegeRestaurante() {
		if (!isset($_SESSION['logasdfdo'])) {
			unset($_SESSION['logasdfdo']);

			if (isset($_SESSION['idAluno'])) {
	    		header("Location: ../index.php");
			}else{
	  			$dominio = $_SERVER['HTTP_HOST'];
 				$url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
	    		header("Location: http://localhost:90/PI/PI5/pages/examples/login-restaurante.php?continua=".$url);
			}
		}
	}
?>