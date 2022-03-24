<?php
namespace Models;

class User extends Conexao{
	public $erros = [];

	public function getUser($email, $senha){
		$query1 = "SELECT * FROM `users` WHERE email = ?";
		
		$stmt = $this->setConn()->prepare($query1);
		$stmt->bindValue(1, $email);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			$query2 = "SELECT * FROM `users` WHERE email =? AND senha = ?";
			$stmt = $this->setConn()->prepare($query2);
			$stmt->bindValue(1, $email);
			$stmt->bindValue(2, $senha);
			$stmt->execute();
			if ($stmt->rowCount() > 0) {
				return true;
			}else{
				array_push($this->erros, 'Palavra-passe incorrecta!');
			}
		}else{
			array_push($this->erros, 'Usuário não encontrado!');
		}
	}










}