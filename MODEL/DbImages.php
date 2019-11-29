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

    public function insert_image($title, $description, $picname, $pseudo, $upload_date, $id_user){
        $query = $this->db->prepare(
            "INSERT INTO picture VALUES (NULL, :title, :description, :picname, :pseudo, :upload_date, :id_user)");

        $query->execute(array(
                ':title' => $title,
                ':description' => $description,
                ':picname' => $picname,
                ':pseudo' => $pseudo,
                ':upload_date' => $upload_date,
                ':id_user' => $id_user
            )
        );
    }

    public function getAllImages(){
        $query = $this->db->prepare("SELECT * FROM picture ORDER BY id_picture DESC");
        $query->execute();

        $result = $query->fetchAll();

        return $result;
    }

    public function getImageUser($pseudo){
        $query = $this->db->prepare('SELECT * FROM picture WHERE pseudo = :pseudo ORDER BY id_picture DESC');
        $query->execute(array(
                ':pseudo' => $pseudo
            )
        );
        $result = $query->fetchAll();
        return $result;
    }

    public function getImageId($id){
        $query = $this->db->prepare('SELECT * FROM picture WHERE id_picture = :id');
        $query->execute(array(
                ':id' => $id
            )
        );
        $result = $query->fetch();
        return $result;
    }

    public function deleteImage($id){
        $query = $this->db->prepare("DELETE FROM picture WHERE id_picture = :id");
        $query->execute(array(
                ':id' => $id
            )
        );

    }

    public function nbImages(){
        $query = $this->db->prepare('SELECT COUNT(id_picture) FROM picture');
        $query->execute();

        $nbRow = $query->fetch();

        return $nbRow;
    }


}