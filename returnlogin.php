<?php

	try {		
		require_once "Connection.class.php";
		$conn = new Connection($_POST['login'], $_POST['senha']);		
    } 
	catch(PDOException $e)
    {
		echo "Ocorreu um erro:" . $e->getMessage();
    }


?>