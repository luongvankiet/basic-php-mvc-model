<?php

use App\Core\Application;

class CreateLocationCourseTable
{
    public function up()
    {
        $sql = "CREATE TABLE location_course (
            location_id INT NOT NULL,
            course_id INT NOT NULL,
            FOREIGN KEY(location_id) REFERENCES locations(id) ON DELETE CASCADE,
            FOREIGN KEY(course_id) REFERENCES courses(id) ON DELETE CASCADE,
            PRIMARY KEY (location_id, course_id)
        )";

        Application::db()->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE IF EXISTS location_course";
        Application::db()->pdo->exec($sql);
    }
}
