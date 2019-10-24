<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 09:45
 */

session_start();

include_once 'VIEW/ViewAccueil.php';
include_once 'VIEW/StartEnd.php';
include_once 'MODEL/DbImages.php';
include_once 'MODEL/DbUsers.php';
include_once 'MODEL/DbConnection.php';

class Accueil implements Display
{
    private $viewAccueil;
    private $startEnd;
    private $dbImages;
    private $dbUser;
    private $dbConnec;

    /**
     * Accueil constructor.
     */
    public function __construct()
    {
        $this->viewAccueil = new ViewAccueil();
        $this->startEnd = new StartEnd();
        $this->dbConnec = new DbConnection();
        $db = $this->dbConnec->connection();
        $this->dbImages = new DbImages($db);
        $this->dbUser = new DbUsers($db);
    }

    public function Display($data = [])
    {

        $this->startEnd->start('SharePics', 'affichageImage');
        $this->startEnd->navbar();
        $this->viewAccueil->createMain();
        $this->startEnd->end();
    }
}