<?php

use ProjetoDuo\controllers\BaseController;

class UsuarioController extends BaseController {
    public function index() {
        $this->render('usuarios', [
            'title' => 'Usuários'
        ]);
    }
}