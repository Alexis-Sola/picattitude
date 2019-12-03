<?php
/**
 * Created by PhpStorm.
 * User: s17018568
 * Date: 28/02/19
 * Time: 16:41
 */
include_once '../../MODEL/DbConnection.php';
include_once '../../MODEL/DbUsers.php';

session_start();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$result = -1;
$pseudo = filter_input(INPUT_POST, 'pseudo');
$password = filter_input(INPUT_POST, 'password');

if (isset($pseudo) && isset($password)){

    $connection = new DbConnection();
    $db = $connection->connection();
    $query = new DbUsers($db);


    $resultquery = $query->loginUsers($pseudo);

    if(empty($pseudo) || empty($password)){
        $result = 0;
    }
    else{
        if(password_verify($password, $resultquery['password'])){

            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['id_user'] = $resultquery['id_user'];
            $_SESSION['rank'] = $resultquery['user_rank'];
            $_SESSION['ipaddr'] = $resultquery['ip_addr'];

            $result = 2;
        }
        else{
            $result = 1;
        }
    }

}

echo json_encode($result);


