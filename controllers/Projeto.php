<?php
namespace controllers{

	class Projeto{

		private $PDO;

		function __construct(){
			$this->PDO = new \PDO('mysql:host=localhost;dbname=webservice', 'root', '');
			$this->PDO->setAttribute( \PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION );
		}

		public function listar($id=null){
			global $app;
			$sql = "SELECT * FROM projetos";
			if($id!=null) $sql.=" WHERE id=".$id;
			$sth = $this->PDO->prepare($sql);
			$sth->execute();
			$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
			$app->render('default.php',["data"=>$result],200); 
		}

		public function salvar($id=null){
			global $app;
			$dados = json_decode($app->request->getBody(), true);
			$dados = (count($dados)==0)? $_POST : $dados;
			$keys = array_keys($dados);
			if($id!=null){
				$sets=array();
				foreach($dados as $k=>$v){
					if($k!='id') $sets[]=$k." = :".$k;
				}
				$sql = "UPDATE projetos SET ".implode(',',$sets)." WHERE id = :id";
			} else {
				$sql = "INSERT INTO projetos (".implode(',', $keys).") VALUES (:".implode(",:", $keys).")";
			}
			$sth = $this->PDO->prepare($sql);
			foreach ($dados as $k => $v) {
				$sth->bindValue(':'.$k,$v);
			}
			if($id!=null) $sth->bindValue(':id',$id);
			$sth->execute();
			if($id!=null){
				$app->render('default.php',["data"=>['id'=>$id]],200);
			} else {
				$app->render('default.php',["data"=>['id'=>$this->PDO->lastInsertId()]],200);
			}
		}

		public function excluir($id){
			global $app;
			$sth = $this->PDO->prepare("DELETE FROM projetos WHERE id = :id");
			$sth ->bindValue(':id',$id);
			$app->render('default.php',["data"=>['status'=>$sth->execute()==1]],200); 
		}
	}
}
