<?php
	require_once "db.php";
	
	function protegeRestaurante() {
		if (isset($_SESSION['tipo'])) {
			if ($_SESSION['tipo'] != 3) {
				header("Location: ../aluno-restaurante");
			}
		}else{
			$dominio = $_SERVER['HTTP_HOST'];
 			$url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
	    	header("Location: http://localhost:90/PI/PI5/login.php?continua=".$url);
		}
	}

	function protegeAlunoFunionario() {
		if (isset($_SESSION['tipo'])) {
			if ($_SESSION['tipo'] == 3) {
				header("Location: ../restaurante");
			}
		}else{
			$dominio = $_SERVER['HTTP_HOST'];
 			$url = "http://" . $dominio. $_SERVER['REQUEST_URI'];
	    	header("Location: http://localhost:90/PI/PI5/login.php?continua=".$url);
		}
	}

?>