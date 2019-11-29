<?php

include_once 'VIEW/StartEnd.php';
include_once 'VIEW/ViewNavigationBar.php';
include_once 'MODEL/DbImages.php';
include_once 'MODEL/DbUsers.php';
include_once 'MODEL/DbConnection.php';
include_once 'VIEW/ViewAddPic.php';

session_start();

class Structure
{
    private $modal_add_pic;
    private $startEnd;
    private $dbImages;
    private $dbUser;
    private $dbConnec;
    private $navbar;

    public function __construct()
    {
        $this->startEnd = new StartEnd();
        $this->dbConnec = new DbConnection();
        $db = $this->dbConnec->connection();
        $this->dbImages = new DbImages($db);
        $this->dbUser = new DbUsers($db);
        $this->navbar = new ViewNavigationBar();
        $this->modal_add_pic = new ViewAddPic();
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


}