<?php

use Dotenv\Dotenv;

class Conexao {
    private static $instance = null;

    private function __construct() {
    }

    public static function getConexao() {
        if (self::$instance == null) {
            try {
                // puxa do .env
                $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
                $dotenv->load();

                $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'];
                $user = $_ENV['DB_USER'];
                $password = $_ENV['DB_PASS'];

                self::$instance = new PDO($dsn, $user, $password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                die('Erro de Conexão: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}