<?php

require_once 'Conexao.php';

class CategoriaModel {
    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function listarCategorias() {
        $sql = "SELECT * FROM categorias ORDER BY nome ASC";
        $stmt = $this->conexao->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}