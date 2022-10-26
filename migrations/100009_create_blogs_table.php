<?php

use App\Core\Application;

class CreateBlogsTable
{
    public function up()
    {
        $sql = "CREATE TABLE blogs (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content text NULL,
            image_path text NULL,
            category_id INT NULL,
            user_id INT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY(category_id) REFERENCES categories(id) ON DELETE CASCADE,
            FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
        )";

        Application::db()->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE IF EXISTS blogs";
        Application::db()->pdo->exec($sql);
    }
}
