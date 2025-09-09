<?php
require_once __DIR__ . '/BaseController.php';

class UsuarioController extends BaseController {
    public function index() {
        $this->render('usuarios', [
            'title' => 'Usuários',
        ]);
    }
}