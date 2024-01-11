<?php
namespace Models;

class Music extends Conexao{

	
	public function getAllMusics(){
		$query = "SELECT * FROM musics ORDER BY lancamento DESC";
		$stmt = $this->setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}


	public function getAdminMusics(){
		$query = "SELECT * FROM musics ORDER BY downloads DESC";
		$stmt = $this->setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}


	public function getBaixados(){
		$query = "SELECT * FROM musics ORDER BY downloads DESC LIMIT 2";
		$stmt = $this->setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}


	public function getMusics(){
		$query = "SELECT * FROM musics ORDER BY lancamento DESC LIMIT 6";
		$stmt = $this->setConn()->prepare($query);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}


	public function getMusic($id){
		$query = "SELECT * FROM musics WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $id);
		$stmt->execute();

		return $dados = $stmt->fetchAll(\PDO::FETCH_OBJ);
	}



	public function addMusic($autor, $titulo, $capa, $musica, $participantes, $tags, $sobre, $tamanho, $dataLan){
		$data = date("Y-m-d H:i:s");
		$downloads = 0;
		$query = "INSERT INTO `musics`(`autor`, `titulo`, `capa`, `music`, `participantes`, `tags`, `sobre`, `downloads`, `tamanho`, `data`, `lancamento`)
		 	VALUES (?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $autor);
		$stmt->bindValue(2, $titulo);
		$stmt->bindValue(3, $capa);
		$stmt->bindValue(4, $musica);
		$stmt->bindValue(5, $participantes);
		$stmt->bindValue(6, $tags);
		$stmt->bindValue(7, $sobre);
		$stmt->bindValue(8, $downloads);
		$stmt->bindValue(9, $tamanho);
		$stmt->bindValue(10, $data);
		$stmt->bindValue(11, $dataLan);
		$stmt->execute();
		if($stmt->rowCount() > 0){
           return true;
       }else{
           return "false";
       }
	}


	public function updateMusic($autor, $titulo, $capa, $musica, $participantes, $tags, $sobre, $tamanho, $dataLan, $id){
		//$data = date("Y-m-d H:i:s");
		$downloads = 0;
		$query = "UPDATE `musics`SET `autor`=?, `titulo`=?, `capa`=?, `music`=?, `participantes`=?, `tags`=?, `sobre`=?, `downloads`=?, `tamanho`=?, `lancamento=?` WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $autor);
		$stmt->bindValue(2, $titulo);
		$stmt->bindValue(3, $capa);
		$stmt->bindValue(4, $musica);
		$stmt->bindValue(5, $participantes);
		$stmt->bindValue(6, $tags);
		$stmt->bindValue(7, $sobre);
		$stmt->bindValue(8, $downloads);
		$stmt->bindValue(9, $tamanho);
		//$stmt->bindValue(10, $data);
		$stmt->bindValue(10, $dataLan);
		$stmt->bindValue(11, $id);
		$stmt->execute();
		if($stmt->rowCount() > 0){
           return true;
       }else{
           return "false";
       }
	}
	
	


	public function upDown($id){
		$query = "UPDATE musics SET downloads = IFNULL(downloads, 0)+1 WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $id);
		$stmt->execute();
	}
	


	public function deleteMusic($id){
		$query = "DELETE FROM  musics WHERE id = ?";
		$stmt = $this->setConn()->prepare($query);
		$stmt->bindValue(1, $id);
		$stmt->execute();
	}

	



}