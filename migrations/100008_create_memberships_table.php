<?php

use App\Core\Application;

class CreateMembershipsTable
{
    public function up()
    {
        $sql = "CREATE TABLE memberships (
            user_id INT NOT NULL,
            memberplan_id INT NOT NULL,
            joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY(user_id) REFERENCES users(id),
            FOREIGN KEY(memberplan_id) REFERENCES member_plans(id),
            PRIMARY KEY (user_id, memberplan_id)
        )";

        Application::db()->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE IF EXISTS memberships";
        Application::db()->pdo->exec($sql);
    }
}
