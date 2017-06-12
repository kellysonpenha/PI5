<?php
	class Connection{
		
		private $host="pisoavalia.cvoenmmd48mt.us-east-2.rds.amazonaws.com";
		private $user="dev_back";
		private $password="Senac2017";
		private $dbname="PI";	
		
		private function setLogin($l, $s){			
			
			//$s = password_verify($s, PASSWORD_BCRYPT);
			//$conn = new PDO("sqlsrv:server = $this->host,1433; Database = $this->dbname", "$this->user", "$this->password");
			$conn = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->user", "$this->password");						
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$stm = $conn->prepare("SELECT * FROM LoginUsuario where email = :login");
			$stm->bindParam(':login', $l, PDO::PARAM_STR);
			$stm->execute();
			$linha = $stm->fetch(PDO::FETCH_ASSOC);
			echo count($linha);
			if($linha == ""){
				echo "false"; 
			}else{
				echo "Passou 1";
				if (password_verify($s, $linha[0]["senha"])) {
					
					$stm2 = $conn->prepare("SELECT nome FROM UsuarioAluno where id = :id");
					$stm2->bindParam(':id', $linha[0]["id"], PDO::PARAM_STR);
					$stm2->execute();
					$linha2 = $stm->fetch(PDO::FETCH_ASSOC);

					session_start();
					$_SESSION["id"] = $linha[0]["id"];
					$_SESSION["tipo"] = $linha[0]["TipoUsuario_id"];
					$_SESSION["nome"] = $linha2[0]["nome"];
					echo $_SESSION["logado"] = md5(uniqid(rand(), true));
				}
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