<?php

use App\Core\Application;

class DummyData
{
    public function up()
    {
        $queries = [];

        //insert categories
        $queries[] = "INSERT INTO categories(name) VALUES
        ('Bootcamp'),('HIIT'),('Yoga'),('Strength')";

        $password = '$2y$10$AHopA..7NApfBfNHyUfCXeLeQDGTTA5Eh83zjUx3yUqDIEV3BKjLm';

        //insert users
        $queries[] = "INSERT INTO users(first_name,last_name,email,phone,password) VALUES
        ('David', 'Smith', 'admin@example.com', '0412345678', '$password'),
        ('Rose', 'Dowson', 'user@gmail.com', '0412345678', '$password')";

        //insert course
        $queries[] = "INSERT INTO courses(name,description,category_id) VALUES
        ('Spartan Training', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1'),
        ('Strength Bootcamp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1'),
        ('Westside Warrior Bootcamp', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '1'),
        ('HIIT HAPPENS CIRCUIT', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2'),
        ('HOT HIIT PILATES', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2'),
        ('CandleLit Yoga', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '3'),
        ('VINYASA YOGA', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '3'),
        ('STRENGTH YOGA', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '3'),
        ('STRENGTH YOGA', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '3'),
        ('STRENGTH YOGA', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '4'),
        ('Les Mills Tone', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '4'),
        ('Strength Lower Body', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '4'),
        ('Strength Upper Body', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '4')
        ";

        $queries[] = "INSERT INTO locations(name, address, phone_contact, email_contact) VALUES
        ('Central', '123 Abc, Central, NSW', '+612345678910', 'contact@example.com'),
        ('Town Hall', '123 Abc, Town Hall, NSW', '+612345678910', 'contact@example.com'),
        ('Redfern', '123 Abc, Redfern, NSW', '+612345678910', 'contact@example.com')
        ";

        $queries[] = "INSERT INTO location_course(course_id, location_id) VALUES
        ('1', '1'),
        ('1', '2'),
        ('1', '3'),
        ('2', '2'),
        ('2', '1'),
        ('5', '1'),
        ('3', '1'),
        ('8', '1'),
        ('9', '1'),
        ('3', '2'),
        ('9', '2'),
        ('6', '2'),
        ('7', '2'),
        ('11', '3'),
        ('5', '3'),
        ('6', '3'),
        ('7', '3'),
        ('9', '3'),
        ('2', '3')
        ";

        $queries[] = "INSERT INTO course_user(user_id, course_id) VALUES
        ('1', '1'),
        ('2', '1'),
        ('1', '2'),
        ('1', '7'),
        ('1', '5'),
        ('2', '9')
        ";

        $queries[] = "INSERT INTO member_plans(name, duration) VALUES
        ('Bronze', '3'),
        ('Silver', '3'),
        ('Gold', '3'),
        ('Diamond', '3')
        ";

        $queries[] = "INSERT INTO memberships(user_id, memberplan_id, joined_at) VALUES
        ('1', '2', '2022-10-07 01:04:37'),
        ('2', '4', '2022-10-07 01:04:37')";

        foreach ($queries as $sql) {
            Application::db()->pdo->exec($sql);
        }
    }

    public function down()
    {
        //
    }
}
