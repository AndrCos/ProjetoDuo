<h1>Editar Tarefa</h1>

<form method="POST" action="?url=tarefas/editar">
    <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" 
           value="<?= htmlspecialchars($tarefa['titulo']) ?>" required>

    <br><br>

    <label for="descricao">Descrição:</label>
    <textarea id="descricao" name="descricao" required><?= htmlspecialchars($tarefa['descricao']) ?></textarea>

    <br><br>

    <label for="status">Status:</label>
    <select id="status" name="status">
        <option value="pendente" <?= $tarefa['status'] === 'pendente' ? 'selected' : '' ?>>Pendente</option>
        <option value="concluida" <?= $tarefa['status'] === 'concluida' ? 'selected' : '' ?>>Concluída</option>
    </select>

    <br><br>

    <label for="categoria">Categoria:</label>
    <select id="categoria" name="categoria">
        <?php foreach ($categorias as $categoria): ?>
            <option value="<?= $categoria['id'] ?>" 
                <?= $tarefa['id_categoria'] == $categoria['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($categoria['nome']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <br><br>

    <button type="submit">Salvar Alterações</button>
</form>

