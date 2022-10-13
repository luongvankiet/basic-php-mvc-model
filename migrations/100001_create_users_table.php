<?php

use App\Core\Application;

class CreateUsersTable
{
    public function up()
    {
        $sql = "CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(255),
            last_name VARCHAR(255),
            email VARCHAR(255) NOT NULL UNIQUE,
            phone VARCHAR(200) NULL,
            password VARCHAR(255) NOT NULL,
            image_path TEXT NULL,
            short_description TEXT NULL,
            description TEXT NULL,
            role VARCHAR(255) NULL DEFAULT 'customer',
            position VARCHAR(255) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        Application::db()->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE users;";
        Application::db()->pdo->exec($sql);
    }
}
