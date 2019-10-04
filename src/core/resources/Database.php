<?php

namespace Core\Resources;

use PDO;
use PDOException;

class Database
{

    private $db;
    private $db_host;
    private $db_name;
    private $db_charset;
    private $db_username;
    private $db_password;

    /**
     * Construct Database object
     */
    public function __construct()
    {
        if (sizeof(func_get_args()) == 5) {
            $this->db_host = func_get_arg(0);
            $this->db_name = func_get_arg(1);
            $this->db_charset = func_get_arg(2);
            $this->db_username = func_get_arg(3);
            $this->db_password = func_get_arg(4);
        } else {
            $this->db_host = Settings::getSettings()->{'database'}->{'db_host'};
            $this->db_name = Settings::getSettings()->{'database'}->{'db_name'};
            $this->db_charset = Settings::getSettings()->{'database'}->{'db_charset'};
            $this->db_username = Settings::getSettings()->{'database'}->{'db_username'};
            $this->db_password = Settings::getSettings()->{'database'}->{'db_password'};
        }

        try {
            $dsn = "mysql:host=$this->db_host;dbname=$this->db_name;charset=$this->db_charset";
            $this->db = new PDO($dsn, "$this->db_username", "$this->db_password");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("\nFatal error: Database doesn't exist.");
        }


    }

    /**
     * Make a secure query to the database and return the result in an array.
     * @param $statement
     * @param $variables
     * @return array
     */
    public function query($statement, $variables)
    {
        $request = $this->db->prepare($statement);
        $request->execute($variables);
        return $request->fetchAll();
    }

    public function execute($statement, $variables)
    {
        $request = $this->db->prepare($statement);
        $request->execute($variables);
    }

    /**
     * Delete element(s) in the database.
     * @param $entity
     * @param $condition
     */
    public function delete($entity, $condition)
    {
        $request = $this->db->prepare("DELETE FROM $entity WHERE $condition");
        $request->execute();
    }

    public function getRequest()
    {
        return $this->request();
    }

}
