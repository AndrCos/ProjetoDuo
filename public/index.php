<?php

session_start();

require 'C:/xampp/htdocs/ProjetoDuo/src/vendor/autoload.php';

use ProjetoDuo\controllers\HomeController;
use ProjetoDuo\controllers\TarefaController;
use ProjetoDuo\controllers\UsuarioController;

$url = $_GET['url'] ?? '';
$parts = explode('/', trim($url, '/'));

$controller = $parts[0] ?: 'home';
$action = $parts[1] ?? 'index';

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
            $ctrl->index();
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