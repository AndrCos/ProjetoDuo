<!-- views/listar_tarefas.php -->
<section class="d-flex align-items-center justify-content-between mb-3">
  <h1 class="h3 m-0">Minhas Tarefas</h1>
  <a href="<?= $base ?>/tarefas/nova" class="btn btn-primary">+ Nova tarefa</a>
</section>

<?php if (empty($tarefas)): ?>
  <div class="text-center py-5 text-muted">
    <p>Nenhuma tarefa por aqui ainda.</p>
  </div>
<?php else: ?>
  <div class="row g-3">
    <?php foreach ($tarefas as $t): ?>
      <div class="col-12 col-md-6 col-lg-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h2 class="h5 card-title mb-1"><?= htmlspecialchars($t['titulo']) ?></h2>
            <p class="card-text text-muted small mb-2">
              Categoria: <?= htmlspecialchars($t['categoria_nome'] ?? '—') ?>
            </p>
            <p class="card-text"><?= nl2br(htmlspecialchars($t['descricao'])) ?></p>
          </div>
          <div class="card-footer bg-white d-flex gap-2">
            <a class="btn btn-outline-secondary btn-sm"
               href="<?= $base ?>/tarefas/editar/<?= (int)$t['id'] ?>">Editar</a>
            <a class="btn btn-outline-danger btn-sm"
               href="<?= $base ?>/tarefas/excluir/<?= (int)$t['id'] ?>"
               onclick="return confirm('Excluir esta tarefa?')">Excluir</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
