<?php
  // Ajuste a URL base conforme seu ambiente
  $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
  $base = $base === '/' ? '' : $base; // previne // no path
  $title = $title ?? 'Projeto Duo';
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($title) ?></title>

  <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">

  <!-- Seu CSS -->
  <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
</head>
<body class="bg-body-tertiary">

  <nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="<?= $base ?>/index.php">ProjetoDuo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div id="nav" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="<?= $base ?>/index.php?url=tarefas">Tarefas</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= $base ?>/index.php?url=tarefas/nova">Nova Tarefa</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= $base ?>/index.php?url=usuarios">Usuários</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Área de mensagens flash (opcional) -->
  <?php if (!empty($_SESSION['flash'])): ?>
    <div class="container mt-3">
      <?php foreach ($_SESSION['flash'] as $type => $msgs): ?>
        <?php foreach ($msgs as $msg): ?>
          <div class="alert alert-<?= htmlspecialchars($type) ?> alert-dismissible fade show">
            <?= htmlspecialchars($msg) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php endforeach; ?>
      <?php endforeach; unset($_SESSION['flash']); ?>
    </div>
  <?php endif; ?>

  <main class="container py-4">
    <?= $content ?? '' ?>
  </main>

  <footer class="border-top py-4 mt-5 bg-white">
    <div class="container small text-muted d-flex justify-content-between">
      <span>© <?= date('Y') ?> Projeto Duo</span>
      <span><a class="link-secondary" href="<?= $base ?>/index.php?url=sobre">Sobre</a></span>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
          crossorigin="anonymous"></script>
  <script src="<?= $base ?>/assets/js/app.js"></script>
</body>
</html>

