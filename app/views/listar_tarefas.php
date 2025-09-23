<?php require_once 'header.php'; ?>

<style>
    body {
        background-color: #e0f2f7; /* Cor de fundo azul claro */
    }
    .card-custom {
        border-radius: 15px; /* Bordas arredondadas */
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Sombra para o card */
    }
    .btn-custom {
        background-color: #007bff; /* Cor do botão principal */
        border-color: #007bff;
        color: white; /* Cor do texto do botão */
        border-radius: 30px; /* Bordas arredondadas para o botão */
        padding: 10px 20px;
    }
    .btn-custom:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-primary">Lista de Tarefas</h1>
    <a href="?url=tarefas/criar" class="btn btn-custom">Adicionar Nova Tarefa</a>
</div>
<hr>

<?php if (empty($tarefas)): ?>
    <div class="alert alert-info" role="alert">
        Nenhuma tarefa encontrada.
    </div>
<?php else: ?>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php foreach ($tarefas as $tarefa): ?>
            <div class="col">
                <div class="card h-100 card-custom">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($tarefa['titulo']) ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($tarefa['categoria_nome']) ?></h6>
                        <p class="card-text"><?= htmlspecialchars($tarefa['descricao']) ?></p>
                        <span class="badge bg-secondary"><?= htmlspecialchars($tarefa['status']) ?></span>
                    </div>
                    <div class="card-footer">
                        <a href="?url=tarefas/editar&id=<?= htmlspecialchars($tarefa['id']) ?>" class="btn btn-sm btn-warning">Editar</a>
                        <a href="?url=tarefas/excluir&id=<?= htmlspecialchars($tarefa['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?');">Excluir</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>