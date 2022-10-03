<?php

use App\Core\Database;

class CreateBookingsTable
{
    public function up()
    {
        $db = new Database();

        $sql = "CREATE TABLE bookings (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            visitor_name VARCHAR(100) NULL,
            visitor_contact VARCHAR(200) NULL,
            entry_date_time DATETIME NULL,
            site_id INT NOT NULL,
            user_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY(site_id) REFERENCES sites(id),
            FOREIGN KEY(user_id) REFERENCES users(id)
        )";

        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = new Database();
        $sql = "DROP TABLE bookings;";
        $db->pdo->exec($sql);
    }
}
