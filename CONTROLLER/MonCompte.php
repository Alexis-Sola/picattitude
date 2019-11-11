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
include_once 'VIEW/ViewAddPic.php';


class MonCompte implements Display
{
    private $viewMonCompte;
    private $startEnd;
    private $dbImages;
    private $dbUser;
    private $dbConnec;
    private $navbar;
    private $modal_add_pic;
    private $dbSearch;



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
        $this->modal_add_pic = new ViewAddPic();

    }


    public function Display($data = [])
    {
        $this->startEnd->head_file('SharePics', 'supprimerPhoto');
        $this->navbar->nav_bar();
        $this->modal_add_pic->modal_add_pic();
        $this->viewMonCompte->head_table();

        $result = $this->dbImages->getImageUser($_SESSION['user_id']);

        foreach ($result as $row){

            $this->viewMonCompte->table_user_account($row['ID'], $row['name']);
        }
        $this->viewMonCompte->close_tab();

        $this->startEnd->formaction_deconnection_navbar();
        $this->startEnd->footer_file();
    }

}