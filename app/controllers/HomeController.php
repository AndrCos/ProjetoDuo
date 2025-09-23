<?php

class HomeController {
    public function index() {
        echo "<!doctype html>";
        echo "<html lang='pt-br'>";
        echo "<head>";
        echo "    <meta charset='utf-8'>";
        echo "    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>";
        echo "    <title>Gerenciador de Tarefas</title>";
        echo "    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>";
        echo "    <style>";
        echo "        body { background-color: #e0f2f7; } /* Azul claro suave */";
        echo "        .card-custom { border-radius: 15px; background-color: #ffffff; padding: 40px; }";
        echo "        .btn-custom { background-color: #007bff; border-color: #007bff; font-size: 1.25rem; padding: 10px 30px; border-radius: 30px; }";
        echo "        .btn-custom:hover { background-color: #0056b3; border-color: #0056b3; }";
        echo "    </style>";
        echo "</head>";
        echo "<body class='d-flex flex-column min-vh-100 justify-content-center align-items-center text-center'>"; // Centraliza tudo
        echo "    <div class='card card-custom shadow-lg'>"; // Card com sombra e arredondado
        echo "        <h1 class='display-4 text-primary mb-3'>Gerenciador de Tarefas</h1>"; // Título em azul
        echo "        <p class='lead text-muted mb-4'>Organize sua vida, uma tarefa de cada vez.</p>";
        echo "        <hr class='my-4'>";
        echo "        <p class='mb-4'>Para ter acesso completo, por favor, faça seu login.</p>";
        echo "        <a class='btn btn-custom text-white' href='index.php?url=login' role='button'>Acessar Conta</a>"; // Botão personalizado
        echo "    </div>";
        echo "    <p class='mt-5 text-muted'>Simplifique seu dia a dia.</p>";
        echo "    <script src='https://code.jquery.com/jquery-3.5.1.slim.min.js'></script>";
        echo "    <script src='https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js'></script>";
        echo "    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>";
        echo "</body>";
        echo "</html>";
    }
}