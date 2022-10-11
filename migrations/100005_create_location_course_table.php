<?php

use App\Core\Application;

class CreateLocationCourseTable
{
    public function up()
    {
        $sql = "CREATE TABLE location_course (
            location_id INT NOT NULL,
            course_id INT NOT NULL,
            FOREIGN KEY(location_id) REFERENCES locations(id),
            FOREIGN KEY(course_id) REFERENCES courses(id),
            PRIMARY KEY (location_id, course_id)
        )";

        Application::db()->pdo->exec($sql);
    }

    public function down()
    {
        $sql = "DROP TABLE location_course;";
        Application::db()->pdo->exec($sql);
    }
}
