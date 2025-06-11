<?php
require_once __DIR__ . '/../autoload.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Prepare product object
$product = new Product($db);

// Get product ID to be deleted
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: ID não fornecido.');

// Set product ID
$product->id = $id;

// Add CSRF protection
if (!isset($_GET['confirm']) || $_GET['confirm'] !== '1') {
    // If not confirmed yet, redirect back with an error
    header('Location: index.php?action=error&message=Confirmação necessária para excluir');
    exit;
}

// Delete the product
if($product->delete()) {
    // Redirect to product list with success message
    header("Location: index.php?action=deleted");
} else {
    // Redirect with error
    header("Location: index.php?action=error");
}
?>