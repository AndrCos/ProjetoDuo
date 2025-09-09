<!-- views/nova_tarefa.php -->
<h1 class="h3 mb-3">Nova Tarefa</h1>

<form action="<?= $base ?>/tarefas/criar" method="post" class="row g-3 needs-validation" novalidate>
  <div class="col-12">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" id="titulo" name="titulo" class="form-control" required>
    <div class="invalid-feedback">Informe um título.</div>
  </div>

  <div class="col-12">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea id="descricao" name="descricao" rows="4" class="form-control" required></textarea>
    <div class="invalid-feedback">Descreva a tarefa.</div>
  </div>

  <div class="col-12 col-md-6">
    <label for="categoria_id" class="form-label">Categoria</label>
    <select id="categoria_id" name="categoria_id" class="form-select" required>
      <option value="" selected disabled>Selecione…</option>
      <?php foreach (($categorias ?? []) as $c): ?>
        <option value="<?= (int)$c['id'] ?>"><?= htmlspecialchars($c['nome']) ?></option>
      <?php endforeach; ?>
    </select>
    <div class="invalid-feedback">Escolha uma categoria.</div>
  </div>

  <div class="col-12 d-flex gap-2">
    <button class="btn btn-primary" type="submit">Salvar</button>
    <a class="btn btn-outline-secondary" href="<?= $base ?>/tarefas">Cancelar</a>
  </div>
</form>
