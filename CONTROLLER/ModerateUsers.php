<?php

include_once 'VIEW/ViewUsers.php';
include_once  'CONTROLLER/Structure.php';

class ModerateUsers extends Structure implements Display
{

    private $viewUsers;

    /**
     * Accueil constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->viewUsers = new ViewUsers();
    }


    public function Display($data = [])
    {

        if($_SESSION['rank'] === 'admin') {


            if ($this->getConnected() === true) {


                $this->getStartEnd()->head_file('pic_attitude(share)');
                $this->getNavbar()->nav_bar($this->getConnected());
                $this->getModalAddPic()->modal_add_pic();
                $this->viewUsers->head_table();

                $result = $this->getDbUser()->getAllUsers();

                foreach ($result as $row) {

                    $this->viewUsers->table_user_account($row['pseudo'], $row['ip_addr']);
                }
                $this->viewUsers->close_tab();

                $this->getStartEnd()->formaction_deconnection_navbar();
                $this->getStartEnd()->footer_file();

            } else {

                $this->getStartEnd()->head_file('pic_attitude(share)');
                $this->getNavbar()->nav_bar($this->getConnected());
                $this->getModalConnec()->modal_connexion();
                $this->getStartEnd()->footer_file();
            }
        }

    }
}