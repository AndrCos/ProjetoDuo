<?php

require_once __DIR__ . '/../models/TarefaModel.php';
require_once __DIR__ . '/../models/CategoriaModel.php';

class TarefaController {
    private $tarefaModel;
    private $categoriaModel;

    public function __construct() {
        $this->tarefaModel = new TarefaModel();
        $this->categoriaModel = new CategoriaModel();
    }

    public function index() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ?url=login');
            exit;
        }

        $id_usuario = $_SESSION['usuario_id'];
        $tarefas = $this->tarefaModel->listarTarefas($id_usuario);
        require_once __DIR__ . '/../views/listar_tarefas.php';
    }

    public function criar() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ?url=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $id_categoria = $_POST['categoria'];
            $id_usuario = $_SESSION['usuario_id'];

            if ($this->tarefaModel->salvarTarefa($titulo, $descricao, $id_usuario, $id_categoria)) {
                header('Location: ?url=tarefas');
                exit;
            } else {
                echo "Erro ao salvar a tarefa.";
            }
        } else {
            $categorias = $this->categoriaModel->listarCategorias();
            require_once __DIR__ . '/../views/nova_tarefa.php';
        }
    }

    public function editar() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ?url=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // atualiza a tarefa no banco
            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $status = $_POST['status'];
            $id_categoria = $_POST['categoria'];

            if ($this->tarefaModel->atualizarTarefa($id, $titulo, $descricao, $status, $id_categoria)) {
                header('Location: ?url=tarefas');
                exit;
            } else {
                echo "Erro ao atualizar a tarefa.";
            }
        } else {
            // forms de edição
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tarefa = $this->tarefaModel->buscarTarefaPorId($id);
                if ($tarefa) {
                    $categorias = $this->categoriaModel->listarCategorias();
                    require_once __DIR__ . '/../views/editar_tarefa.php';
                } else {
                    echo "Tarefa não encontrada.";
                }
            } else {
                header('Location: ?url=tarefas');
                exit;
            }
        }
    }
    
    public function excluir() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ?url=login');
            exit;
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if ($this->tarefaModel->excluirTarefa($id)) {
                header('Location: ?url=tarefas');
                exit;
            } else {
                echo "Erro ao excluir a tarefa.";
            }
        } else {
            header('Location: ?url=tarefas');
            exit;
        }
    }
}