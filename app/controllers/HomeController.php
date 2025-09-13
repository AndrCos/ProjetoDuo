<?php

use ProjetoDuo\controllers\BaseController;

class HomeController extends BaseController {
    public function index() {
        $this->render('home', [
            'title' => 'Página Inicial'
        ]);
    }
}
