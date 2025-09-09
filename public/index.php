<?php

require_once __DIR__ . '/../vendor/autoload.php';

// dir dos controladores
define('CONTROLLER_PATH', __DIR__ . '/../app/controllers/');

// puxa url
$url = $_GET['url'] ?? 'home'; // Define 'home' como padrão se a URL não for informada

// root
switch ($url) {
    case 'home':
        require_once CONTROLLER_PATH . 'HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;

    case 'tarefas':
        require_once CONTROLLER_PATH . 'TarefaController.php';
        $controller = new TarefaController();
        $controller->index();
        break;

    case 'tarefas/criar':
        require_once CONTROLLER_PATH . 'TarefaController.php';
        $controller = new TarefaController();
        $controller->criar();
        break;
        
    case 'tarefas/editar':
        require_once CONTROLLER_PATH . 'TarefaController.php';
        $controller = new TarefaController();
        $controller->editar();
        break;

    case 'tarefas/excluir':
        require_once CONTROLLER_PATH . 'TarefaController.php';
        $controller = new TarefaController();
        $controller->excluir();
        break;
        
    case 'usuario':
        require_once CONTROLLER_PATH . 'UsuarioController.php';
        $controller = new UsuarioController();
        $controller->index();
        break;

    default:
        http_response_code(404);
        require_once CONTROLLER_PATH . 'ErroController.php';
        $controller = new ErroController();
        $controller->notFound();
        break;
}