<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 10:41
 */

class DbConnection
{
    private $host;
    private $dbName;
    private $username;
    private $pass;

    /**
     * DbConnection constructor.
     * @param $host
     * @param $dbName
     * @param $username
     * @param $pass
     */

    public function __construct()
    {
        $this->host = 'mysql-alexissola.alwaysdata.net';
        $this->dbName = 'alexissola_bd';
        $this->username = 192834;
        $this->pass = 'Alexis07?';
    }

    public function connection(){
        $db = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->pass);
        return $db;
    }

}