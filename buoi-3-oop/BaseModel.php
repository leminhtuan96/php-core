<?php



class BaseModel
{
    private $table;

    private $pdo;

    public function __construct($table)
    {
        echo '<pre/>';
        print_r($this);
        $this->table = $table;
        $this->conectDatabase();
    }
    public function create($dataCreate)
    {
        try{
            $table = $this->table;
            $keys = array_keys($dataCreate);
            $columns = implode(', ', $keys);
            $values = array_values($dataCreate);
    
            $valueColumn = '';
            foreach ($values as $valueItem) {
                $valueColumn = $valueColumn . "'" . $valueItem . "',";
            }
            $valueColumn = rtrim($valueColumn, ',');
    
            $sql = "INSERT INTO $table($columns) values ($valueColumn)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $id = $this->pdo->lastInsertId();
            if ($id) {
                return $id;
            }
            return 'insert fail';
        }catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        // echo $sql;
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
            $this->pdo = new \PDO($dsn, $user, $pass);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
