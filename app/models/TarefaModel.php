<?php

require_once 'Conexao.php';

class TarefaModel {
    private $conexao;

    public function __construct() {
        $this->conexao = Conexao::getConexao();
    }

    public function listarTarefas($id_usuario) {
        // aqui inclui o nome da categoria
        $sql = "SELECT t.*, c.nome as categoria_nome FROM tarefas t INNER JOIN categorias c ON t.id_categoria = c.id WHERE t.id_usuario = :id_usuario ORDER BY t.id DESC";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function salvarTarefa($titulo, $descricao, $id_usuario, $id_categoria) {
        // aqui vai o id da categoria
        $sql = "INSERT INTO tarefas (titulo, descricao, id_usuario, id_categoria) VALUES (:titulo, :descricao, :id_usuario, :id_categoria)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindValue(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->bindValue(':id_categoria', $id_categoria, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function buscarTarefaPorId($id) {
        //  buscar o nome da categoria junto com a tarefa
        $sql = "SELECT t.*, c.nome as categoria_nome FROM tarefas t INNER JOIN categorias c ON t.id_categoria = c.id WHERE t.id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarTarefa($id, $titulo, $descricao, $status, $id_categoria) {
        // aqui pemite a edição da categoria
        $sql = "UPDATE tarefas SET titulo = :titulo, descricao = :descricao, status = :status, id_categoria = :id_categoria WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindValue(':descricao', $descricao, PDO::PARAM_STR);
        $stmt->bindValue(':status', $status, PDO::PARAM_STR);
        $stmt->bindValue(':id_categoria', $id_categoria, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function excluirTarefa($id) {
        $sql = "DELETE FROM tarefas WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}