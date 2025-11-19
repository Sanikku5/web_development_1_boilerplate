<?php

namespace App\Controllers;

// Use altijd onder de namespace declaratie
Use App\Config;
Use PDO;

class GuestbookController
{
    public function getAll($vars = [])
    {
        try {            
            $connectionString = "mysql:host=" . Config::DB_SERVER_NAME . ';dbname=' . Config::DB_NAME . ';charset-utf8b4';
            //Create new PDO connection
            // new \PDO to access it without the Use declaration above.
            $connection = new PDO(
                $connectionString,
                Config::DB_USERNAME,
                Config::DB_PASSWORD,
            );
            // Tell PDO to throw exceptions on error
            $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // ECHO "Database connection established successfully.";

            
            $result = $connection -> query(query: "SELECT * FROM posts");
            $posts = $result-> fetchAll(PDO::FETCH_ASSOC);

            // DIR is aangeraden
            require(__DIR__ . '/../Views/guestbook.php');

        } catch  (\PDOException $e) {
            //Handle connection error
            die('Database Connection Failed: ' . $e -> getMessage());
        }
    }
}
