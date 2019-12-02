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

if (isset($_POST['pseudo']) && isset($_POST['password'])){

    $connection = new DbConnection();
    $db = $connection->connection();
    $query = new DbUsers($db);

    $username = $_POST['pseudo'];
    $pass = $_POST['password'];

    $resultquery = $query->loginUsers($username);

    if(empty($username) || empty($pass)){
        $result = 0;
    }
    else{
        if(password_verify($pass, $resultquery['password'])){

            $_SESSION['pseudo'] = $username;
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


