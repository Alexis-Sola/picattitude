<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 09:45
 */

session_start();

include_once 'VIEW/StartEnd.php';
include_once 'MODEL/DbImages.php';
include_once 'MODEL/DbUsers.php';
include_once 'MODEL/DbConnection.php';
include_once 'VIEW/ViewAddPic.php';
include_once 'VIEW/ViewNavigationBar.php';
include_once 'VIEW/ViewCard.php';


class Accueil implements Display
{
    private $startEnd;
    private $dbImages;
    private $dbUser;
    private $dbConnec;
    private $modal_add_pic;
    private $navbar;
    private $cards;

    /**
     * Accueil constructor.
     */
    public function __construct()
    {
        $this->startEnd = new StartEnd();
        $this->dbConnec = new DbConnection();
        $db = $this->dbConnec->connection();
        $this->dbImages = new DbImages($db);
        $this->dbUser = new DbUsers($db);
        $this->modal_add_pic = new ViewAddPic();
        $this->navbar = new ViewNavigationBar();
        $this->cards = new ViewCard();

    }

    public function Display($data = [])
    {

        $this->startEnd->head_file('SharePics');
        $this->navbar->nav_bar();
        $this->modal_add_pic->modal_add_pic();
        $this->startEnd->formaction_deconnection_navbar();

        $result =  $this->dbImages->getAllImages();
        $this->cards->first_card();
        $this->cards->open_carddeck();

        foreach ($result as $row){
            $user = $this->dbUser->selectUserWithLogin($row['users']);
            $this->cards->card_image($row['titre'], $row['desc'], $user['login'], $row['date'], $row['name']);

        }

        $this->cards->close_carddeck();
        $this->startEnd->footer_file();
    }
}