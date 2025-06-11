<?php
// autoload.php
// Manual autoload file for PHP Product Management System

// Config files
require_once __DIR__ . '/src/Config/Database.php';

// Model files
require_once __DIR__ . '/src/Models/Product.php';

// Function to format currency
function formatCurrency($value) {
    return 'R$ ' . number_format($value, 2, ',', '.');
}
?>