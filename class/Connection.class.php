<?php
	class Connection extends pdo{
		
		private $host="localhost";
		private $user="root";
		private $password="";
		private $dbname="test";			
		
		private function conectionDB(){
			$conn = parent::__construct("mysql:host=$this->host;dbname=$this->dbname","$this->user", "$this->password", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			return $conn;			
		}
		
		public function __construct(){
			return $this->conectionDB();			
		}		
		private function setLogin($l, $s){			
			
			//$conn = new PDO("sqlsrv:server = $this->host,1433; Database = $this->dbname", "$this->user", "$this->password");
			$conn = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->user", "$this->password");							
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$conn = $conn->prepare("SELECT login, senha FROM usuario where login = :login and senha = :senha");
			$conn->bindParam(':login', $l, PDO::PARAM_STR);
			$conn->bindParam(':senha', $s, PDO::PARAM_STR);
			$conn->execute();
			$linha = $conn->fetch(PDO::FETCH_ASSOC);
			if($linha == ""){
				echo "false";  
			}else{					
				session_start();
				echo $_SESSION["logado"] = md5(uniqid(rand(), true));
			}
		}
		
		
		/*private function setAvaliacaoRestaurante($tipo, $nome, $raiting){
			

			if($nome == "limpeza"){
				$conn = $this->conectionDB();
				$raiting;
				$tipo;
			
			}else if($nome == "tempodeespera"){
				$raiting;
				$tipo;
				
			}else if($nome =="valor"){
				$raiting;
				$tipo;
				
			}else if($nome =="sabor"){
				$raiting;
				$tipo;
			
			}else if($nome =="qualidadeatendimento"){
				$raiting;
				$tipo;			
			}			
			
		}
		*/
		
		private function conexao(){
			return $this->conectionDB();		
		}
		
		private function setAvaliacao(){
			$conn = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->user", "$this->password");							
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$conn = $conn->prepare("UPDATE SET ");
			$conn->bindParam(':login', $l, PDO::PARAM_STR);
			$conn->bindParam(':senha', $s, PDO::PARAM_STR);
			$conn->execute();
			
			
		}
		
		
		public function getConexao(){
			return $this->conexao();			
		}
		
		
		
		/*Public Function __construct($l, $s){		
			try{										
				$this->setLogin($l, $s);				
			}
			catch(PDOException $e)
			{
				echo "Ocorreu um erro:" . $e->getMessage();
			}				
			
		}*/
		
	}	
?>