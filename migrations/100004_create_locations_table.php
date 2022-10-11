<?php

use App\Core\Application;

class CreateLocationsTable
{
    public function up()
    {
        $sql = "CREATE TABLE locations (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            address VARCHAR(255) NOT NULL,
            phone_contact VARCHAR(255) NOT NULL,
            email_contact VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        Application::db()->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE locations;";
        Application::db()->pdo->exec($sql);
    }
}
