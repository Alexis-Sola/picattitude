<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 09:45
 */
session_start();

include_once 'VIEW/ViewSharedPics.php';
include_once  'CONTROLLER/Structure.php';

class SharedPics extends Structure implements Display
{
    private $viewSharedPics;

    /**
     * Accueil constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->viewSharedPics = new ViewSharedPics();
    }


    public function Display($data = [])
    {
        if($this->getConnected() === true) {


            $this->getStartEnd()->head_file('pic_attitude(share)', 'supprimerPhoto');
            $this->getNavbar()->nav_bar($this->getConnected());
            $this->getModalAddPic()->modal_add_pic();
            $this->viewSharedPics->head_table();

            if ($_SESSION['rank'] === "admin" || $_SESSION['rank'] === "modo") {

                $result = $this->getDbImages()->getAllImages();

            } else {
                $result = $this->getDbImages()->getImageUser($_SESSION['pseudo']);
            }

            foreach ($result as $row) {

                $this->viewSharedPics->table_user_account($row['id_picture'], $row['pic_name']);
            }
            $this->viewSharedPics->close_tab();

            $this->getStartEnd()->formaction_deconnection_navbar();
            $this->getStartEnd()->footer_file();
        }
        else{

            $this->getStartEnd()->head_file('pic_attitude(share)', 'supprimerPhoto');
            $this->getNavbar()->nav_bar($this->getConnected());
            $this->getModalConnec()->modal_connexion();
            $this->getStartEnd()->footer_file();
        }
    }

}