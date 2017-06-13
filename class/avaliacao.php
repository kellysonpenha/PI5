<?php
require_once "Connection.class.php";

$conexao = new Connection();

$idUsuario = $_POST['idUsuario'];
$idRestaurante = $_POST["idRestaurante"];
$raiting = $_POST["raiting"];
$tipo = $_POST["tipo"];


function setAvaliacaoRestaurante($restaurante, $estrelas, $tipoAvaliacao, $idUsuario){	
	

	if($tipoAvaliacao == "limpeza"){
		$avaliarRestaurante = $conexao->prepare('UPDATE AvaliacaoUsuario set Limpeza where id_Restaurante = $restaurante');	
		$avaliarRestaurante->bindParam(':idRestaurante', $idRestaurante, PDO::PARAM_INT);				
	
	}else if($tipoAvaliacao == "tempodeespera"){
		return $tipoAvaliacao;
		
	}else if($tipoAvaliacao =="valor"){
		return $tipoAvaliacao;
		
	}else if($tipoAvaliacao =="sabor"){
		return $tipoAvaliacao;
	
	}else if($tipoAvaliacao =="qualidadeatendimento"){
		return $tipoAvaliacao;
	}

	$avaliarRestaurante->execute();		
	
}

//$tipo = limpeza, tempo, e etc.

//echo ($idRestaurante . " " . $raiting . " " . $tipo . " ". $idUsuario);


/*$pagination_statement = $pdo_conn->prepare('SELECT * FROM AvaliacaoUsuario where id_Restaurante = :id');	
$pagination_statement->bindParam(':id', $idURL, PDO::PARAM_INT);
$pagination_statement->execute();*/








?>