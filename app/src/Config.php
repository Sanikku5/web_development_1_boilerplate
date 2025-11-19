<?php

namespace App;

// Better to use .env files
class Config {
    // Host name in docker-compose.yml
    public const DB_SERVER_NAME = 'mysql';
    // Please don't use these usernames and password in your project
    public const DB_USERNAME = 'root';
    public const DB_PASSWORD = 'secret123';
    public const DB_NAME = 'guestbook';
}