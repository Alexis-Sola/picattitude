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

                $rank_user_connected = $_SESSION['rank'];

                $this->getStartEnd()->head_file('pic_attitude(share)', 'delete_account');
                $this->getNavbar()->nav_bar($this->getConnected(),$this->getColorRank(), $rank_user_connected);
                $this->getModalAddPic()->modal_add_pic();
                $this->viewUsers->head_table();

                $result = $this->getDbUser()->get_user_modo();
                $this->getCards()->open_carddeck();

                $cpt = 1;
                foreach ($result as $row) {

                    if($row['user_rank'] === "modo"){
                        $color = "green";
                    }
                    else{
                        $color = "blue";
                    }


                    $this->viewUsers->table_user_account($row['pseudo'], $row['ip_addr'], $cpt++, $row['user_rank'], $color);
                }
                $this->viewUsers->close_tab();

                $this->getCards()->close_carddeck();
                $this->getStartEnd()->formaction_deconnection_navbar();
                $this->getStartEnd()->footer_file();

            }
        }
        elseif ($_SESSION['rank'] === 'modo'){

            if ($this->getConnected() === true) {

                $rank_user_connected = $_SESSION['rank'];

                $this->getStartEnd()->head_file('pic_attitude(share)', 'delete_account');
                $this->getNavbar()->nav_bar($this->getConnected(), $rank_user_connected);
                $this->getModalAddPic()->modal_add_pic();
                $this->viewUsers->head_table();

                $result = $this->getDbUser()->get_user();
                $this->getCards()->open_carddeck();

                $cpt = 1;
                foreach ($result as $row) {

                    $this->viewUsers->table_user_account($row['pseudo'], $row['ip_addr'],$cpt++, $row['user_rank'], "blue");
                }

                $this->viewUsers->close_tab();

                $this->getCards()->close_carddeck();
                $this->getStartEnd()->formaction_deconnection_navbar();
                $this->getStartEnd()->footer_file();

            }
        }

    }
}