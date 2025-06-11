# Project Summary
The project is a PHP-based Product Management web application that allows users to efficiently manage product data through a responsive interface. It supports CRUD operations on products, enabling users to add, edit, and delete items in a user-friendly manner. The application focuses on maintaining database integrity while providing a visually appealing experience.

# Project Module Description
- **Database Configuration**: Sets up the MySQL database and defines the 'produtos' table structure.
- **Product Model**: Manages data operations related to products, implementing CRUD functionalities.
- **User Interface**: Comprises HTML forms for product management, a listing page, and enhanced CSS for styling, ensuring responsiveness and usability.

# Directory Tree
```
php_template/
├── autoload.php             # Manual autoloader for class includes
├── composer.json            # Composer configuration file
├── database/
│   └── setup.sql           # SQL script for setting up the database
├── public/
│   ├── add_product.php      # Form for adding new products
│   ├── css/
│   │   └── style.css        # Styles for the application, improved with a harmonious color palette and responsiveness
│   ├── delete_product.php    # Script for deleting products
│   ├── edit_product.php      # Form for editing existing products
│   └── index.php            # Main page listing all products with enhanced styling and interaction
├── src/
│   ├── Config/
│   │   └── Database.php     # Database connection and configuration
│   └── Models/
│       └── Product.php      # Product model for CRUD operations
└── src/includes/
    ├── footer.php           # Footer include for pages, updated for improved styling
    └── header.php           # Header include for pages, updated for improved styling
```

# File Description Inventory
- **autoload.php**: Handles manual loading of class files without using Composer.
- **composer.json**: Configuration for Composer dependencies (not used in this environment).
- **setup.sql**: SQL commands for creating the database and 'produtos' table.
- **public/*.php**: Various scripts for product management functionalities (add, edit, delete, list), now with improved user interaction and feedback.
- **src/Config/Database.php**: Contains the database connection logic.
- **src/Models/Product.php**: Defines the Product model and its methods for database interactions.
- **src/includes/*.php**: Header and footer includes for consistent page layout, updated for enhanced styling.

# Technology Stack
- **Languages**: PHP, HTML, CSS
- **Database**: MySQL
- **Tools**: Composer (for dependency management, not utilized fully in this setup)

# Usage
1. **Install Dependencies**: Navigate to the project directory and run `composer install` if Composer is available. Otherwise, ensure the autoload file is set up correctly.
2. **Database Setup**: Execute the `setup.sql` script in your MySQL database to create the necessary tables.
3. **Run the Application**: Access the `public/index.php` file to view and interact with the product management system.
