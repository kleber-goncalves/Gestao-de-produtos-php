<?php
// Product model class

class Product {
    private $conn;
    private $table_name = "produtos";

    // Object properties
    public $id;
    public $nome;
    public $descricao;
    public $preco;

    // Constructor with database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Read all products
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Read one product
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if($row) {
            $this->nome = $row['nome'];
            $this->descricao = $row['descricao'];
            $this->preco = $row['preco'];
            return true;
        }
        
        return false;
    }

    // Create product
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, descricao=:descricao, preco=:preco";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->preco = htmlspecialchars(strip_tags($this->preco));

        // Bind values
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":preco", $this->preco);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Update product
    public function update() {
        $query = "UPDATE " . $this->table_name . " 
                SET nome=:nome, descricao=:descricao, preco=:preco
                WHERE id=:id";
        
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->descricao = htmlspecialchars(strip_tags($this->descricao));
        $this->preco = htmlspecialchars(strip_tags($this->preco));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind values
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":preco", $this->preco);
        $stmt->bindParam(":id", $this->id);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete product
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind id
        $stmt->bindParam(":id", $this->id);

        // Execute query
        if($stmt->execute()) {
            return true;
        }

        return false;
    }
}