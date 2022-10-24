<?php

use App\Core\Application;

class CreateMemberplansTable
{
    public function up()
    {
        $sql = "CREATE TABLE member_plans (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT NULL,
            duration INT NULL,
            unit VARCHAR(255) NULL DEFAULT 'month',
            classes int NULL DEFAULT 1,
            price float NULL DEFAULT 14.99,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        Application::db()->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE IF EXISTS member_plans";
        Application::db()->pdo->exec($sql);
    }
}
