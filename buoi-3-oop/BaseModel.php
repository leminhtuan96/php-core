<?php



class BaseModel
{
    private $table;

    public function __construct($table)
    {
        echo '<pre/>';
        print_r($this);
        $this->table = $table;
        $this->conectDatabase();
    }
    public function create($dataCreate)
    {
        $dataCreate = "INSERT INTO products('name', 'discription', 'price')
                    values ('tuan','san pham',300)";
    }
    public function conectDatabase()
    {
        $host = '127.0.0.1';
        $db   = 'test';
        $user = 'root';
        $pass = 'root';
        $port = '3306';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
        try {
            $pdo = new \PDO($dsn, $user, $pass);
            var_dump('connet success');
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
