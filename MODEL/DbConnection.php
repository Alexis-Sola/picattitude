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
        $this->host = 'mysql-share-pics.alwaysdata.net';
        $this->dbName = 'share-pics_alex';
        $this->username = 178436;
        $this->pass = 'azerty';
    }

    public function connection(){
        $db = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->pass);
        return $db;
    }

}