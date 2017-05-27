<?php
	class Connection extends pdo{
		
		private $host="localhost";
		private $user="root";
		private $password="";
		private $dbname="test";			
		
		private function conectionDB(){
			$conn = parent::__construct("mysql:host=$this->host;dbname=$this->dbname","$this->user", "$this->password");
			return $conn;			
		}
		
		public function __construct(){
			return $this->conectionDB();			
		}
		
		
		
		
		//$conn = new PDO("sqlsrv:server = $this->host,1433; Database = $this->dbname", "$this->user", "$this->password");
		
		
		
		
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