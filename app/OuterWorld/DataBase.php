<?php
/*
 * Database singleton
 */
namespace app\OuterWorld;
use \PDO;

class DataBase
{
    private static $instance = null;
    private $pdo;

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->pdo = self::initialize();
    }

    public static function initialize()
    {
        try {
            $dsn = sprintf('%s:host=%s;dbname=%s', 'mysql', 'localhost', 'RavenDB');

            $opt = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            return new PDO($dsn, 'root', '', $opt);
        } catch (\PDOException $exception) {
            exit($exception->getMessage());
        }
    }
}