<?php
	class Connection{
		
		private $host="pisoavalia.cvoenmmd48mt.us-east-2.rds.amazonaws.com";
		private $user="dev_back";
		private $password="Senac2017";
		private $dbname="PI";	
		
		
		//$conn = new PDO("sqlsrv:server = $this->host,1433; Database = $this->dbname", "$this->user", "$this->password");
		private function setLogin($l, $s){			
			
			//$conn = new PDO("sqlsrv:server = $this->host,1433; Database = $this->dbname", "$this->user", "$this->password");
			$conn = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->user", "$this->password");							
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$conn = $conn->prepare("SELECT id, email, senha FROM UsuarioAluno where email = :login and senha = :senha");
			$conn->bindParam(':login', $l, PDO::PARAM_STR);
			$conn->bindParam(':senha', $s, PDO::PARAM_STR);
			$conn->execute();
			$linha = $conn->fetch(PDO::FETCH_ASSOC);
			if($linha == ""){
				echo "false";  
				
			}else{					
				session_start();
				var_dump($linha);
				echo $_SESSION["id"] = $linha[0]["id"];
				echo $_SESSION["logado"] = md5(uniqid(rand(), true));
			}
		}
		
		
		
		
		Public Function __construct($l, $s){		
			try{										
				$this->setLogin($l, $s);				
			}
			catch(PDOException $e)
			{
				echo "Ocorreu um erro:" . $e->getMessage();
			}				
			
		}
		
	}	
?>