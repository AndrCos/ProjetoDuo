<?php
session_start();

// Carregar os controllers
require __DIR__ . '/../app/controllers/HomeController.php';
require __DIR__ . '/../app/controllers/TarefaController.php';
require __DIR__ . '/../app/controllers/UsuarioController.php';

// Captura a URL (ex: index.php?url=tarefas/nova)
$url = $_GET['url'] ?? '';
$parts = explode('/', trim($url, '/'));

// Definir controlador e ação
$controller = $parts[0] ?: 'home';
$action = $parts[1] ?? 'index';

// Roteamento simples
switch ($controller) {
    case 'tarefas':
        $ctrl = new TarefaController();
        if ($action === 'nova') {
            $ctrl->nova();
        } elseif ($action === 'salvar') {
            $ctrl->salvar();
        } elseif ($action === 'editar') {
            $id = $parts[2] ?? null;
            $ctrl->editar($id);
        } elseif ($action === 'atualizar') {
            $ctrl->atualizar();
        } elseif ($action === 'excluir') {
            $id = $parts[2] ?? null;
            $ctrl->excluir($id);
        } else {
            $ctrl->index(); // listar tarefas
        }
        break;

    case 'usuarios':
        $ctrl = new UsuarioController();
        $ctrl->index();
        break;

    case 'home':
    default:
        $ctrl = new HomeController();
        $ctrl->index();
        break;
}
