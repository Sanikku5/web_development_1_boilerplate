<?php

namespace App\Controllers;

// Use altijd onder de namespace declaratie
use App\Config;
use PDO;

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
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // ECHO "Database connection established successfully.";

            $result = $connection->query(query: "SELECT * FROM posts");
            $posts = $result->fetchAll(PDO::FETCH_ASSOC);

            // DIR is aangeraden
            require(__DIR__ . '/../Views/guestbook.php');

        } catch (\PDOException $e) {
            //Handle connection error
            die('Database Connection Failed: ' . $e->getMessage());
        }
    }

    public function add()
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
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            ECHO "connected and add attempted.";

            // TODO: validate input
            // TODO: send error messages back if validation fails
            // Create prepared statement
            $statement = $connection->prepare(
                'INSERT INTO post (name, email, message) VALUES (:name, :email, :message)'
            );

            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $message = $_POST['message'] ?? '';

            // Bind parameters
            $statement->bindparam(':name', $name);
        } catch (\PDOException $e) {
            //Handle connection error
            die('Database Connection Failed: ' . $e->getMessage());
        }
    }
}
