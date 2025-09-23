<?php

require_once __DIR__ . '/../models/UsuarioModel.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuario = $this->usuarioModel->buscarPorEmail($email);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                session_start();
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                
                header('Location: ?url=tarefas');
                exit;
            } else {
                $erro = "E-mail ou senha inválidos.";
                require_once __DIR__ . '/../views/login.php';
            }
        } else {
            require_once __DIR__ . '/../views/login.php';
        }
    }

    public function cadastro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            if ($this->usuarioModel->salvarUsuario($nome, $email, $senhaHash)) {
                header('Location: ?url=login');
                exit;
            } else {
                $erro = "Erro ao cadastrar. O e-mail já pode estar em uso.";
                require_once __DIR__ . '/../views/cadastro.php';
            }
        } else {
            require_once __DIR__ . '/../views/cadastro.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ?url=login');
        exit;
    }
}