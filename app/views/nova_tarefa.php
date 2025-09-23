<?php require_once 'header.php'; ?>

<h1>Adicionar Nova Tarefa</h1>
<form action="?url=tarefas/criar" method="POST">
    <div class="mb-3">
        <label for="titulo" class="form-label">Título:</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição:</label>
        <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria:</label>
        <select id="categoria" name="categoria" class="form-select" required>
            <?php foreach ($categorias as $categoria): ?>
                <option value="<?= htmlspecialchars($categoria['id']) ?>">
                    <?= htmlspecialchars($categoria['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Salvar Tarefa</button>
    <a href="?url=tarefas" class="btn btn-secondary">Voltar</a>
</form>

</div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>