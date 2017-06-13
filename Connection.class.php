<?php
	class Connection{
		
		private $host="pisoavalia.cvoenmmd48mt.us-east-2.rds.amazonaws.com";
		private $user="dev_back";
		private $password="Senac2017";
		private $dbname="PI_oficial";	
		
		private function setLogin($l, $s){			
			
			//$s = password_verify($s, PASSWORD_BCRYPT);
			//$conn = new PDO("sqlsrv:server = $this->host,1433; Database = $this->dbname", "$this->user", "$this->password");
			$conn = new PDO("mysql:host=$this->host;dbname=$this->dbname","$this->user", "$this->password");						
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			$stm = $conn->prepare("SELECT * FROM LoginUsuario where email = :login");
			$stm->bindParam(':login', $l, PDO::PARAM_STR);
			$stm->execute();
			$linha = $stm->fetch(PDO::FETCH_ASSOC);
			
			if($linha == ""){
				echo "false"; 
			}else{
				if (password_verify($s, $linha["senha"])) {
					
					$stm2 = $conn->prepare("SELECT nome FROM UsuarioAluno where id = :id");
					$stm2->bindParam(':id', $linha[0]["id"], PDO::PARAM_STR);
					$stm2->execute();
					$linha2 = $stm->fetch(PDO::FETCH_ASSOC);

					session_start();
					$_SESSION["id"] = $linha["id"];
					$_SESSION["tipo"] = $linha["TipoUsuario_id"];
					$_SESSION["nome"] = $linha2["nome"];
					$_SESSION["logado"] = md5(uniqid(rand(), true));
					$result = array('tipo' => $linha["TipoUsuario_id"],
									'token' => $_SESSION["logado"]);
					echo json_encode($result);
				}else{
					echo "false";
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