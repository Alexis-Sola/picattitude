<?php
/**
 * Created by PhpStorm.
 * User: s17018568
 * Date: 08/03/19
 * Time: 14:27
 */

class DbImages
{
    private $db;

    /**
     * DbUsers constructor.
     * @param $db
     */

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertImages($nom, $titre, $descrip, $users, $date){
        $query = $this->db->prepare("INSERT INTO `image`(`ID`, `name`,`titre`, `desc`, `users`, `date`) VALUES (null, :image, :titre, :descrip, :users, :madate)");

        $query->execute(array(
                ':image' => $nom,
                ':titre' => $titre,
                ':descrip' => $descrip,
                ':users' => $users,
                ':madate' => $date
            )
        );
    }

    public function getAllImages(){
        $query = $this->db->prepare("SELECT * FROM image ORDER BY ID DESC");
        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }

    public function getImageUser($login){
        $query = $this->db->prepare('SELECT * FROM image WHERE users = :login ORDER BY ID DESC');
        $query->execute(array(
                ':login' => $login
            )
        );
        $result = $query->fetchAll();
        return $result;
    }

    public function getImageId($id){
        $query = $this->db->prepare('SELECT * FROM image WHERE ID = :id');
        $query->execute(array(
                ':id' => $id
            )
        );
        $result = $query->fetch();
        return $result;
    }

    public function deleteImage($id){
        $query = $this->db->prepare("DELETE FROM `image` WHERE ID = :id");
        $query->execute(array(
                ':id' => $id
            )
        );

    }

    public function nbImages(){
        $query = $this->db->prepare('SELECT ID FROM image');
        $query->execute();

        $nbRow = $query->rowCount();

        return $nbRow;
    }


}