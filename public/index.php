<?php
require_once __DIR__ . '/../autoload.php';

// Include header
include_once '../src/includes/header.php';

// Database connection
$database = new Database();
$db = $database->getConnection();

// Initialize Product object
$product = new Product($db);

// Read all products
$stmt = $product->read();
$num = $stmt->rowCount();

// Process action messages
if (isset($_GET['action'])) {
    switch($_GET['action']) {
        case 'deleted':
            echo "<div class='alert alert-success'><i class='fas fa-check-circle'></i> Produto excluído com sucesso!</div>";
            break;
        case 'error':
            $message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : 'Ocorreu um erro ao processar sua solicitação.';
            echo "<div class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> {$message}</div>";
            break;
    }
}
?>

<div class="container">
    <div class="page-header">
        <h1><i class="fas fa-list"></i> Lista de Produtos</h1>
    </div>

    <div class="action-buttons">
        <a href="add_product.php" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar Novo Produto</a>
    </div>

    <?php if($num > 0) { ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $stmt->fetch(\PDO::FETCH_ASSOC)) { 
                        extract($row); ?>
                        <tr class="product-row" data-id="<?php echo $id; ?>">
                            <td><?php echo $id; ?></td>
                            <td><strong><?php echo htmlspecialchars($nome); ?></strong></td>
                            <td><?php echo substr(htmlspecialchars($descricao), 0, 100) . (strlen($descricao) > 100 ? "..." : ""); ?></td>
                            <td class="price-column"><strong><?php echo formatCurrency($preco); ?></strong></td>
                            <td class="action-column">
                                <a href="edit_product.php?id=<?php echo $id; ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Editar</a>
                                <a href="#" onclick="deleteProduct(<?php echo $id; ?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="product-count">
            <p><i class="fas fa-info-circle"></i> Exibindo <?php echo $num; ?> produto<?php echo $num > 1 ? 's' : ''; ?>.</p>
        </div>
    <?php } else { ?>
        <div class="alert alert-info">
            <p>Nenhum produto encontrado. <a href="add_product.php" class="alert-link">Clique aqui</a> para adicionar o primeiro produto.</p>
        </div>
    <?php } ?>
</div>

<script>
function deleteProduct(id) {
    if(confirm('Tem certeza que deseja excluir este produto?\n\nEsta ação não pode ser desfeita.')) {
        window.location = 'delete_product.php?id=' + id + '&confirm=1';
    }
}

// Add interactive features
document.addEventListener('DOMContentLoaded', function() {
    // Make entire product row clickable (opens edit page)
    const productRows = document.querySelectorAll('.product-row');
    productRows.forEach(row => {
        row.addEventListener('click', function(e) {
            // Don't trigger if clicking on action buttons
            if (!e.target.closest('.btn')) {
                const id = this.getAttribute('data-id');
                window.location = 'edit_product.php?id=' + id;
            }
        });
    });
    
    // Fade out alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    if (alerts.length > 0) {
        setTimeout(function() {
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 1s ease';
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 1000);
            });
        }, 5000);
    }
});
</script>

<?php 
// Include footer
include_once '../src/includes/footer.php'; 
?>