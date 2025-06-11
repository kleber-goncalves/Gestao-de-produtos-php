<?php
require_once __DIR__ . '/../autoload.php';

// Include header
include_once '../src/includes/header.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Prepare objects
$product = new Product($db);

// Get ID of the product to be edited
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID não fornecido.');

// Set product ID
$product->id = $id;

// Read the details of product to be edited
$product->readOne();

// Process form submission
if($_POST) {
    // Set product values
    $product->nome = $_POST["nome"];
    $product->descricao = $_POST["descricao"];
    $product->preco = $_POST["preco"];
    
    // Update the product
    if($product->update()) {
        echo "<div class='alert alert-success'>Produto atualizado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Não foi possível atualizar o produto.</div>";
    }
}
?>

<div class="container">
    <div class="page-header">
        <h1><i class="fas fa-edit"></i> Editar Produto</h1>
    </div>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}"); ?>" method="post" id="edit-product-form">
        <div class="form-group">
            <label for="nome"><i class="fas fa-tag"></i> Nome do Produto</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?php echo htmlspecialchars($product->nome); ?>" placeholder="Digite o nome do produto" required>
        </div>

        <div class="form-group full-width">
            <label for="descricao"><i class="fas fa-align-left"></i> Descrição do Produto</label>
            <textarea class="form-control" name="descricao" id="descricao" rows="4" placeholder="Descreva detalhes sobre o produto" required><?php echo htmlspecialchars($product->descricao); ?></textarea>
        </div>

        <div class="form-group">
            <label for="preco"><i class="fas fa-money-bill-wave"></i> Preço (R$)</label>
            <input type="number" class="form-control" name="preco" id="preco" value="<?php echo htmlspecialchars($product->preco); ?>" step="0.01" min="0" placeholder="0.00" required>
            <small class="form-text text-muted">Use ponto como separador decimal. Ex: 99.90</small>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar Alterações</button>
            <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </form>
</div>

<script>
// Form validation
document.getElementById('edit-product-form').addEventListener('submit', function(event) {
    let valid = true;
    const nome = document.getElementById('nome').value.trim();
    const preco = document.getElementById('preco').value;
    
    if (nome.length < 3) {
        alert('O nome do produto deve ter pelo menos 3 caracteres.');
        valid = false;
    }
    
    if (parseFloat(preco) <= 0) {
        alert('O preço deve ser maior que zero.');
        valid = false;
    }
    
    if (!valid) {
        event.preventDefault();
    }
});
</script>

<?php 
// Include footer
include_once '../src/includes/footer.php'; 
?>