<?php require_once 'header.php'; ?>
 
<style>
    body {
        background-color: #e0f2f7; /* Fundo azul claro */
    }
    .card-custom {
        border-radius: 15px; /* Bordas arredondadas */
        box-shadow: 0 4px 8px rgba(0,0,0,0.1); /* Sombra para o card */
        background-color: #ffffff;
        padding: 40px;
    }
    .btn-custom {
        background-color: #007bff; /* Cor do botão principal */
        border-color: #007bff;
        color: white;
        border-radius: 30px;
        padding: 10px 30px;
    }
    .btn-custom:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .btn-secondary-custom {
        background-color: #6c757d; /* Cor do botão secundário */
        border-color: #6c757d;
        color: white;
        border-radius: 30px;
        padding: 10px 30px;
    }
    .btn-secondary-custom:hover {
        background-color: #5a6268;
        border-color: #5a6268;
    }
</style>
 
<div class="d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card card-custom" style="width: 100%; max-width: 600px;">
        <h3 class="text-center text-primary mb-4">Adicionar Nova Tarefa</h3>
        <div class="card-body">
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
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-custom">Salvar Tarefa</button>
                    <a href="?url=tarefas" class="btn btn-secondary-custom">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>