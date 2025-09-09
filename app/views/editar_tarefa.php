<h1 class="h3 mb-3">Editar Tarefa</h1>

<form action="<?= $base ?>/tarefas/editar" method="post" class="row g-3 needs-validation" novalidate>
  <!-- escondemos o id da tarefa -->
  <input type="hidden" name="id" value="<?= (int)$tarefa['id'] ?>">

  <div class="col-12">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" id="titulo" name="titulo"
           class="form-control"
           value="<?= htmlspecialchars($tarefa['titulo']) ?>"
           required>
    <div class="invalid-feedback">Informe um título.</div>
  </div>

  <div class="col-12">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea id="descricao" name="descricao" rows="4"
              class="form-control" required><?= htmlspecialchars($tarefa['descricao']) ?></textarea>
    <div class="invalid-feedback">Descreva a tarefa.</div>
  </div>

  <div class="col-12 col-md-6">
    <label for="categoria_id" class="form-label">Categoria</label>
    <select id="categoria_id" name="categoria" class="form-select" required>
      <option value="" disabled>Selecione…</option>
      <?php foreach ($categorias as $c): ?>
        <option value="<?= (int)$c['id'] ?>"
          <?= $c['id'] == $tarefa['id_categoria'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($c['nome']) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <div class="invalid-feedback">Escolha uma categoria.</div>
  </div>

  <div class="col-12 col-md-6">
    <label for="status" class="form-label">Status</label>
    <select id="status" name="status" class="form-select" required>
      <option value="pendente" <?= $tarefa['status'] === 'pendente' ? 'selected' : '' ?>>Pendente</option>
      <option value="concluida" <?= $tarefa['status'] === 'concluida' ? 'selected' : '' ?>>Concluída</option>
    </select>
    <div class="invalid-feedback">Escolha um status.</div>
  </div>

  <div class="col-12 d-flex gap-2">
    <button class="btn btn-primary" type="submit">Salvar Alterações</button>
    <a class="btn btn-outline-secondary" href="<?= $base ?>/tarefas">Cancelar</a>
  </div>
</form>
