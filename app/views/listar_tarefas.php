<?php require_once 'header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Lista de Tarefas</h1>
    <a href="?url=tarefas/criar" class="btn btn-primary">Adicionar Nova Tarefa</a>
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
                <div class="card h-100">
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