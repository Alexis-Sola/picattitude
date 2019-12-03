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

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$result = -1;
$pseudo = filter_input(INPUT_POST, 'login');
$pass1 = filter_input(INPUT_POST, 'pass1');
$pass2 = filter_input(INPUT_POST, 'pass2');
$mail = filter_input(INPUT_POST, 'mail');

if (isset($pseudo) && isset($pass1) && isset($pass2) && isset($mail)){

    $connection = new DbConnection();
    $db = $connection->connection();
    $query = new DbUsers($db);


    $nbRow = $query->sameLogin($pseudo);
    if(empty($pseudo) || empty($pass1) || empty($pass2) || empty($mail)){
        $result = 0;
    }
    else{

        if(strlen($pass1) < 8){
            $result = 3;
        }

        else if($pass1 !== $pass2){
            $result = 4;
        }

        else if($nbRow >= 1){
            $result = 2;
        }
        else{
            $result = 1;
            $_SESSION['rank'] = 'user';
            $query->insertUsers("user", $ip, password_hash($pass1,  PASSWORD_DEFAULT), $pseudo, $mail);
        }

    }

}

echo json_encode($result);