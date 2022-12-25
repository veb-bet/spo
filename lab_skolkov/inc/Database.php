<?php
class Database
{
    //
    private static $instance = null;
    private $connection = null;

    //
    private function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost:3310;dbname=skolkov_lab', 'root', "",
                                    [
                                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                        PDO::ATTR_EMULATE_PREPARES => false

                                    ]);
    }

    //
    protected function __clone(){}
    public function __wakeup(){}

    //
    public static function getInstance(): Database
    {
        if(self::$instance == null){
            self::$instance = new static();
        }
        return self::$instance;
    }

    //
    public static function connection(): PDO
    {
        return static::getInstance()->connection;
    }

    //
    public static function prepare($statement): PDOStatement
    {
        return static::connection()->prepare($statement);
    }

    //
    public static function lastInsertId(): int
    {
        return intval(static::connection()->lastInsertId());
    }
}
?>