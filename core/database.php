<?php

class Database{
    private $con,$stmt;
    public function __construct()
    {
        try{
            $this->con = new PDO("mysql:host=localhost;dbname=uas212410102033;",'tia212410102033','ganti cuy',[PDO::ATTR_PERSISTENT=>true,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
        }catch(PDOException $e){
            die($e->getMessage());
            exit();
        }
    }
    
    public function query(string $query)
    {
        $this->stmt = $this->con->prepare($query);
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
    
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}

?>
