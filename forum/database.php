<?php

class Database{
    private $con,$stmt;
    public function __construct()
    {
        try{
            $this->con = new PDO("mysql:host=localhost;dbname=uas212410102033;",'tia212410102033','secret',[PDO::ATTR_PERSISTENT=>true,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        }catch(PDOException $e){
            die($e->getMessage());
            exit();
        }
    }
    
    public function query(string $query)
    {
        $this->stmt = $this->con->prepare($query);
    }
    
    public function bind($param, $value, $type=null )
    {
        if (is_null($type))
        {
            switch(true){
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function getAssoc()
    {
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSingle()
    {
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){
        return $this->stmt->rowCount();
    }
}

?>