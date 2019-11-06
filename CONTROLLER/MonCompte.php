<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 09:45
 */
session_start();

include_once 'VIEW/ViewMonCompte.php';
include_once 'VIEW/StartEnd.php';
include_once 'MODEL/DbImages.php';
include_once 'MODEL/DbUsers.php';
include_once 'MODEL/DbConnection.php';
include_once 'VIEW/ViewNavigationBar.php';


class MonCompte implements Display
{
    private $viewMonCompte;
    private $startEnd;
    private $dbImages;
    private $dbUser;
    private $dbConnec;
    private $navbar;


    /**
     * Accueil constructor.
     */
    public function __construct()
    {
        $this->viewMonCompte = new ViewMonCompte();
        $this->startEnd = new StartEnd();
        $this->dbConnec = new DbConnection();
        $db = $this->dbConnec->connection();
        $this->dbImages = new DbImages($db);
        $this->dbUser = new DbUsers($db);
        $this->navbar = new ViewNavigationBar();

    }


    public function Display($data = [])
    {
        $this->startEnd->head_file('SharePics', 'supprimerPhoto');
        $this->navbar->nav_bar();
        $this->startEnd->formaction_deconnection_navbar();
        $this->viewMonCompte->createmain();

        $cpt = 0;

        /*foreach ($result as $row){

            $user = $this->dbUser->selectUserWithLogin($row['users']);

            if($cpt === 0){
                $this->viewMonCompte->rowCard();
            }
            elseif($cpt % 2 === 0){
                $this->viewMonCompte->closeDiv();
                $this->viewMonCompte->rowCard();
            }
            $this->viewMonCompte->showImagesBd($row['name'], $row['titre'], $row['desc'], $row['date'], $row['ID'], $user['login']);
            ++$cpt;

        }
        $this->viewMonCompte->closeDiv();*/
        $this->startEnd->footer_file();
    }

}