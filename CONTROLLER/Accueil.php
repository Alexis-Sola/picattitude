<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 09:45
 */

session_start();

include_once 'VIEW/ViewCard.php';
include_once  'CONTROLLER/Structure.php';

class Accueil extends Structure implements Display
{
    private $cards;

    /**
     * Accueil constructor.
     */

    public function __construct()
    {
        parent::__construct();
        $this->cards = new ViewCard();
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
        $this->cards->first_card($this->getConnected());
        $this->cards->open_carddeck();

        foreach ($result as $row) {

            $user = $this->getDbUser()->selectUserWithLogin($row['pseudo']);

            $this->cards->card_image(

                $row['title'],
                $row['description'],
                $user['pseudo'],
                $row['upload_date'],
                $row['pic_name'],
                $user['user_rank']

            );

        }

        $this->cards->close_carddeck();
        $this->getStartEnd()->footer_file();
    }

}