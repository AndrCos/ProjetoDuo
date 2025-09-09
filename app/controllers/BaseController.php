<?php

class BaseController {
    protected function render(string $view, array $data = []) {
        extract($data); // cria variáveis com base nas chaves de $data
        ob_start();
        require __DIR__ . "/../views/{$view}.php";
        $content = ob_get_clean();

        require __DIR__ . "/../views/layout.php";
    }
}
