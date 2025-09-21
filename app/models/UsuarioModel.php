<?php

require_once __DIR__ . '/Conexao.php';

class UsuarioModel {

    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    // busca um usuário pelo e-mail
    public function buscarPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // salva um novo usuário no banco de dados
    public function salvarUsuario($nome, $email, $senhaHash) {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senhaHash);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            // retorna false em caso de erro, como e-mail duplicado
            return false;
        }
    }
}