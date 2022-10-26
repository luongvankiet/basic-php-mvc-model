<?php

use App\Core\Application;

class CreateCourseUserTable
{
    public function up()
    {
        $sql = "CREATE TABLE course_user (
            user_id INT NOT NULL,
            course_id INT NOT NULL,
            FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY(course_id) REFERENCES courses(id) ON DELETE CASCADE,
            PRIMARY KEY (user_id, course_id)
        )";

        Application::db()->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE IF EXISTS course_user";
        Application::db()->pdo->exec($sql);
    }
}
