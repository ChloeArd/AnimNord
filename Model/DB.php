<?php

namespace Model;

use PDO;
use PDOException;

class DB {

    private string $server = 'localhost';
    private string $db = 'blog_eval';
    private string $user = 'root';
    private string $password = '';

    private static ?PDO $dbInstance = null;

    /**
     * Db Static constructor.
     */
    public function __construct() {
        try {
            self::$dbInstance = new PDO("mysql:host=$this->server;dbname=$this->db;charset=utf8", $this->user, $this->password);
            self::$dbInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbInstance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    /**
     * Return PDO instance.
     */
    public static function getInstance(): ?PDO {
        if (null === self::$dbInstance) {
            new self();
        }
        return self::$dbInstance;
    }
}