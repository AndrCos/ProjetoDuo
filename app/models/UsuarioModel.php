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
}