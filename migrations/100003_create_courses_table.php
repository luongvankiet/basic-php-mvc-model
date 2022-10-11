<?php

use App\Core\Application;

class CreateCoursesTable
{
    public function up()
    {
        $sql = "CREATE TABLE courses (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description text NULL,
            image_path text NULL,
            category_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY(category_id) REFERENCES categories(id)
        )";

        Application::db()->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE courses;";
        Application::db()->pdo->exec($sql);
    }
}
