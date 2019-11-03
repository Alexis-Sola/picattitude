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
    public $err_connec_bd;

    /**
     * DbConnection constructor.
     * @param $host
     * @param $dbName
     * @param $username
     * @param $pass
     */

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbName = 'id11344999_sharepics';
        $this->username = 'id11344999_alexis';
        $this->pass = 'azerty';
    }

    public function connection(){
        try {
                $conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->pass);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch(PDOException $e) {
                $this->err_connec_bd =  "Connection failed: " . $e->getMessage();
            }
    }

}