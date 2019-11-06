<?php
/**
 * Created by PhpStorm.
 * User: s17018568
 * Date: 08/03/19
 * Time: 14:34
 */

session_start();

include_once 'VIEW/StartEnd.php';
include_once  'VIEW/ViewPartage.php';
include_once 'MODEL/DbImages.php';
include_once 'MODEL/DbConnection.php';
include_once 'MODEL/DbUsers.php';

class PartagePhoto implements Display
{
    private $startEnd;
    private $partage;
    private $dbImages;
    private $dbConnec;
    private $dbUser;

    /**
     * PartagePhoto constructor.
     */
    public function __construct()
    {
        $this->startEnd = new StartEnd();
        $this->partage = new  ViewPartage();
        $this->dbConnec = new DbConnection();
        $db = $this->dbConnec->connection();
        $this->dbImages = new DbImages($db);
        $this->dbUser = new DbUsers($db);
    }

    public function ajoutPhotos(){

        $error = false;
        $result = "Photo ajouté avec succès";

        try {
            $bytes = random_bytes(16);
        } catch (Exception $e) {
            echo 'problem';
        }

        $newName = bin2hex($bytes);
        $legalExtensions = array("JPG", "PNG", "GIF", "JPEG");
        $legalSize = 10000000;

        $image = $_FILES['image'];

        $actualName = $image['name'];
        $actualSize = $image['size'];
        $descrip = $_POST['image_text'];
        $titre = $_POST['titre'];

        $extension = pathinfo($actualName, PATHINFO_EXTENSION);


        if(strlen($titre) > 25){
            $error = true;
            $result = "Titre trop long ! 25 caractères max !";
            $this->partage->showBadResult($result);
        }

        if(strlen($descrip) > 100){
            $error = true;
            $result = "Description trop longue ! 100 caractère max !";
            $this->partage->showBadResult($result);
        }

        if (empty($actualName) || $actualSize === 0) {
            $error = true;
            $result = "Le fichier est vide";
            $this->partage->showBadResult($result);
        }

        elseif (!(in_array(strtoupper($extension), $legalExtensions))) {
            $error = true;
            $result = "L'extension n'est pas bonne";
            $this->partage->showBadResult($result);
        }

        elseif (file_exists('image/' . $newName . '.' . $extension)) {
            $error = true;
            $result = "Le fichier existe déjà";
            $this->partage->showBadResult($result);
        }
        elseif (!($actualSize < $legalSize)) {
            $error = true;
            $result = "Fichier trop gros !";
            $this->partage->showBadResult($result);
        }

        if ($error === false) {

            $dbConnec = new DbConnection();
            $db = $dbConnec->connection();
            $dbImages = new DbImages($db);
            $dbUser = new DbUsers($db);

            $target = "image/" . $newName . '.' . $extension;

            $user =  $_SESSION['user_id'];
            $date = date('Y-m-d');

            $this->dbImages->insertImages($newName . '.' . $extension, $titre, $descrip, $user, $date);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $result = "Photo ajouté avec succés";
                $this->partage->showGreatResult($result);
            } else {
                $result = "Oups ça c'est mal passé quelque part, réessayez. ";
                $this->partage->showBadResult($result);
            }

        }

    }

    public function Display($data = [])
    {
        $this->startEnd->head_file('Partage');
        $this->startEnd->formaction_deconnection_navbar();

        if(isset($_POST['action'])){

            $this->ajoutPhotos();
        }

        $this->partage->showPartage();
        $this->startEnd->footer_file();
    }

}