<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body { background-color: #e0f2f7; }
        .card-custom { 
            border-radius: 15px; 
            background-color: #ffffff; 
            padding: 40px;
            max-width: 500px; /* AQUI ESTÁ A ALTERAÇÃO */
        }
        .btn-custom { background-color: #007bff; border-color: #007bff; font-size: 1.25rem; padding: 10px 30px; border-radius: 30px; }
        .btn-custom:hover { background-color: #0056b3; border-color: #0056b3; }
    </style>
</head>
<body class="d-flex flex-column min-vh-100 justify-content-center align-items-center text-center">
    <div class="card card-custom shadow-lg">
        <h3 class="text-center text-primary mb-4">Criar Nova Conta</h3>
        <div class="card-body">
            <?php if (isset($erro)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $erro ?>
                </div>
            <?php endif; ?>
            <form action="?url=cadastro" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha" required>
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-custom text-white">Cadastrar</button>
                </div>
            </form>
            <hr class="mt-4 mb-3">
            <div class="text-center">
                <p class="text-muted">Já tem uma conta? <a href="?url=login" class="text-decoration-none">Faça login aqui</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>