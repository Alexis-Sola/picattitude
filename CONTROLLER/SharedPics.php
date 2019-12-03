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
        $rank_user_connected = $_SESSION['rank'];

        if($this->getConnected() === true) {

            $this->getStartEnd()->head_file('pic_attitude(share)', 'supprimerPhoto');
            $this->getNavbar()->nav_bar($this->getConnected(),$this->getColorRank(), $rank_user_connected);
            $this->getModalAddPic()->modal_add_pic();
            $this->viewSharedPics->head_table();

            if ($_SESSION['rank'] === "admin") {

                $result = $this->getDbImages()->get_image_user_modo_admin($_SESSION['pseudo']);

            }
            elseif ($_SESSION['rank'] === "modo"){
                $result = $this->getDbImages()->get_image_user_modo($_SESSION['pseudo']);
            }

            else {
                $result = $this->getDbImages()->get_image_with_pseudo($_SESSION['pseudo']);
            }

            $cpt = 1;

            foreach ($result as $row) {

                if($row['user_rank'] === "admin"){
                    $color = "red";
                }
                elseif($row['user_rank'] === "modo"){
                    $color = "green";
                }
                else{
                    $color = "blue";
                }

                $this->viewSharedPics->table_user_account(

                    $cpt++,
                    $row['pic_name'],
                    $row['pseudo'],
                    $row['user_rank'],
                    $color
                );
            }
            $this->viewSharedPics->close_tab();

            $this->getStartEnd()->formaction_deconnection_navbar();
            $this->getStartEnd()->footer_file();
        }

    }

}