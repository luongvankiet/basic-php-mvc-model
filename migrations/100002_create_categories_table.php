<?php

use App\Core\Application;

class CreateCategoriesTable
{
    public function up()
    {
        $sql = "CREATE TABLE categories (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        Application::db()->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE categories;";
        Application::db()->pdo->exec($sql);
    }
}
