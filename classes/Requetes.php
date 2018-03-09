<?php

class Requetes
{
    private $dsn = "mysql:dbname=auxitec;host=localhost;charset=utf8";
    private $user = "auxitec";
    private $password = "auxitec";
    private $db;

    function __construct()
    {
        try {
            $this -> db = new PDO($this -> dsn, $this -> user, $this -> password);
            $this -> db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        catch (PDOException $e) {
            Log::logWrite($e -> getMessage());
        }
    }

    function update($sql)
    {
        return $this -> db -> exec($sql);
    }

    function insert($sql)
    {
        return $this -> db -> exec($sql);
    }

    function select($sql)
    {
        return $this -> db -> query($sql);
    }

    function getLastId() {
        return $this -> db -> lastInsertId();
    }

    function __destruct()
    {
        unset($this -> db);
    }
}