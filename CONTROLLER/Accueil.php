<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 09:45
 */

session_start();

include_once  'CONTROLLER/Structure.php';

class Accueil extends Structure implements Display
{


    public function __construct()
    {
        parent::__construct();
    }

    public function Display($data = [])
    {

        $rank_user_connected = $_SESSION['rank'];

        $this->getStartEnd()->head_file('pic_attitude(share)');
        $this->getNavbar()->nav_bar($this->getConnected(), $this->getColorRank(), $rank_user_connected);
        $this->getModalConnec()->modal_connexion();
        $this->getModalConnec()->modal_insc();
        $this->getModalAddPic()->modal_add_pic();
        $this->getStartEnd()->formaction_deconnection_navbar();

        $result =  $this->getDbImages()->getAllImages();
        $this->getCards()->first_card($this->getConnected());
        $this->getCards()->open_carddeck();

        foreach ($result as $row) {

            $user = $this->getDbUser()->selectUserWithLogin($row['pseudo']);

            $this->getCards()->card_image(

                $row['title'],
                $row['description'],
                $user['pseudo'],
                $row['upload_date'],
                $row['pic_name'],
                $user['user_rank']

            );

        }

        $this->getCards()->close_carddeck();
        $this->getStartEnd()->footer_file();
    }

}