<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 09:45
 */
session_start();

include_once 'VIEW/ViewMonCompte.php';
include_once  'CONTROLLER/Structure.php';

class MonCompte extends Structure implements Display
{
    private $viewMonCompte;

    /**
     * Accueil constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->viewMonCompte = new ViewMonCompte();
    }


    public function Display($data = [])
    {
        $this->getStartEnd()->head_file('pic_attitude(share)', 'supprimerPhoto');
        $this->getNavbar()->nav_bar();
        $this->getModalAddPic()->modal_add_pic();
        $this->viewMonCompte->head_table();

        if($_SESSION['rank'] === "admin" || $_SESSION['rank'] === "modo"){

            $result =  $this->getDbImages()->getAllImages();

        }
        else{
            $result = $this->getDbImages()->getImageUser($_SESSION['pseudo']);
        }

        foreach ($result as $row){

            $this->viewMonCompte->table_user_account($row['id_picture'], $row['pic_name']);
        }
        $this->viewMonCompte->close_tab();

        $this->getStartEnd()->formaction_deconnection_navbar();
        $this->getStartEnd()->footer_file();
    }

}