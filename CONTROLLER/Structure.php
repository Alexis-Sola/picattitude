<?php

include_once 'VIEW/StartEnd.php';
include_once 'VIEW/ViewNavigationBar.php';
include_once 'MODEL/DbImages.php';
include_once 'MODEL/DbUsers.php';
include_once 'MODEL/DbConnection.php';
include_once 'VIEW/ViewAddPic.php';
include_once 'VIEW/ViewModalConnec.php';
include_once 'VIEW/ViewCard.php';

session_start();

class Structure
{
    private $modal_add_pic;
    private $startEnd;
    private $dbImages;
    private $dbUser;
    private $dbConnec;
    private $navbar;
    private $modal_connec;
    private $connected;
    private $color_rank;
    private $cards;

    public function __construct()
    {
        if (isset($_SESSION['pseudo'])){
            $this->connected = true;
        }
        else{
            $this->connected = false;
        }

        if($_SESSION['rank'] === "admin"){
            $this->color_rank = "red";
        }
        elseif($_SESSION['rank'] === "modo"){
            $this->color_rank = "green";
        }
        else{
            $this->color_rank = "blue";
        }

        $this->startEnd = new StartEnd();
        $this->dbConnec = new DbConnection();
        $db = $this->dbConnec->connection();
        $this->dbImages = new DbImages($db);
        $this->dbUser = new DbUsers($db);
        $this->navbar = new ViewNavigationBar();
        $this->modal_add_pic = new ViewAddPic();
        $this->modal_connec = new ViewModalConnec();
        $this->cards = new ViewCard();

    }

    /**
     * @return ViewAddPic
     */
    protected function getModalAddPic()
    {
        return $this->modal_add_pic;
    }


    /**
     * @return StartEnd
     */
    protected function getStartEnd()
    {
        return $this->startEnd;
    }

    /**
     * @return DbImages
     */
    protected function getDbImages()
    {
        return $this->dbImages;
    }

    /**
     * @return DbUsers
     */
    protected function getDbUser()
    {
        return $this->dbUser;
    }

    /**
     * @return ViewNavigationBar
     */
    protected function getNavbar()
    {
        return $this->navbar;
    }

    protected function getModalConnec()
    {
        return $this->modal_connec;
    }

    protected function getConnected()
    {
        return $this->connected;
    }

    protected function getColorRank()
    {
        return $this->color_rank;
    }

    protected function getCards()
    {
        return $this->cards;
    }
}