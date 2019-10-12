<?php
class Usuarios {

	public function getUsuarios(){
		global $pdo;

		$sql = $pdo->query("SELECT * FROM usuarios");
		$row = $sql->fetchAll();

		return $row;
	}

	public function cadastrar($nome, $email, $senha, $telefone,$cep, $rua, $bairro, $cidade) {
		global $pdo;
		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() == 0) {

			$sql = $pdo->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha, telefone = :telefone, cep = :cep, rua = :rua, bairro = :bairro, cidade = :cidade");
			$sql->bindValue(":nome", $nome);
			$sql->bindValue(":email", $email);
			$sql->bindValue(":senha", md5($senha));
			$sql->bindValue(":telefone", $telefone);
			$sql->bindValue(":cep", $cep);
			$sql->bindValue(":rua", $rua);
			$sql->bindValue(":bairro", $bairro);
			$sql->bindValue(":cidade", $cidade);
			
			$sql->execute();

			return true;

		} else {
			return false;
		}

	}

	public function login($email, $senha) {
		global $pdo;

		$sql = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email AND senha = :senha");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":senha", md5($senha));
		$sql->execute();

		if($sql->rowCount() > 0) {
			$dado = $sql->fetch();
			$_SESSION['cLogin'] = $dado['id'];
			return true;
		} else {
			return false;
		}

	}














}
?>