<?php
/**
 * Created by PhpStorm.
 * User: s17018568
 * Date: 28/02/19
 * Time: 13:35
 */

include_once '../../MODEL/DbConnection.php';
include_once '../../MODEL/DbUsers.php';

session_start();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$result = -1;

if (isset($_POST['login']) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['mail']) && isset($_POST['name'])){
    $connection = new DbConnection();
    $db = $connection->connection();
    $query = new DbUsers($db);

    $login = $_POST['login'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $mail = $_POST['mail'];
    $name = $_POST['name'];

    $nbRow = $query->sameLogin($login);
    if(empty($login) || empty($pass1) || empty($pass2) || empty($mail) || empty($name)){
        $result = 0;
    }
    else{

        if(strlen($pass1) < 0){
            $result = 3;
        }

        else if($pass1 !== $pass2){
            $result = 4;
        }

        else if($nbRow > 1){
            $result = 2;
        }
        else{
            $result = 1;
            $query->insertUsers($login, password_hash($pass1,  PASSWORD_DEFAULT), $mail, $name);
        }

    }

}


echo json_encode($result);