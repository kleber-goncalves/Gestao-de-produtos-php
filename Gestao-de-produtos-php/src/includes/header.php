<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento de Produtos</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-boxes"></i> Gerenciamento de Produtos
            </a>
            <ul class="navbar-nav">
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="add_product.php"><i class="fas fa-plus-circle"></i> Adicionar Produto</a></li>
            </ul>
        </div>
    </nav>

    <?php
    // Check for action messages
    if(isset($_GET['action'])) {
        if($_GET['action'] == 'deleted') {
            echo "<div class='container'><div class='alert alert-success'>Produto excluído com sucesso.</div></div>";
        } elseif($_GET['action'] == 'error') {
            echo "<div class='container'><div class='alert alert-danger'>Não foi possível excluir o produto.</div></div>";
        }
    }
    ?>