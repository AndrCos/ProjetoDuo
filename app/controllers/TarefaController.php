<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/TarefaModel.php';
require_once __DIR__ . '/../models/CategoriaModel.php';

class TarefaController extends BaseController {
    private $tarefaModel;
    private $categoriaModel;

    public function __construct() {
        $this->tarefaModel = new TarefaModel();
        $this->categoriaModel = new CategoriaModel();
    }

  public function index()
{
    $tarefas = $this->tarefaModel->listarComCategoria(); // ajuste ao seu model
    $this->render('listar_tarefas', [
        'title'   => 'Minhas Tarefas',
        'tarefas' => $tarefas
    ]);
}

public function nova()
{
    $categorias = $this->categoriaModel->todas();
    $this->render('nova_tarefa', [
        'title'      => 'Nova Tarefa',
        'categorias' => $categorias
    ]);
}


    public function criar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $id_categoria = $_POST['categoria'];
            $id_usuario = 1;

            if ($this->tarefaModel->salvarTarefa($titulo, $descricao, $id_usuario, $id_categoria)) {
                header('Location: ?url=tarefas');
                exit;
            } else {
                echo "Erro ao salvar a tarefa.";
            }
        } else {
            $categorias = $this->categoriaModel->listarCategorias();
            $this->render('nova_tarefa', [
                'title'      => 'Nova Tarefa',
                'categorias' => $categorias
            ]);
        }
    }

    public function editar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $tarefa = $this->tarefaModel->buscarTarefaPorId($id);
                if ($tarefa) {
                    $categorias = $this->categoriaModel->listarCategorias();
                    $this->render('editar_tarefa', [
                        'title'      => 'Editar Tarefa',
                        'tarefa'     => $tarefa,
                        'categorias' => $categorias
                    ]);
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
