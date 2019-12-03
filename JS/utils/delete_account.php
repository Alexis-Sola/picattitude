<?php

include_once '../../MODEL/DbConnection.php';
include_once '../../MODEL/DbUsers.php';

session_start();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$result = false;

$pseudo = filter_input(INPUT_POST, 'pseudo-suppr');

if(isset($pseudo)){

    $connection = new DbConnection();
    $db = $connection->connection();
    $dbuser = new DbUsers($db);
    $rank_user = $dbuser->selectUserWithLogin($pseudo)['user_rank'];

    if($rank_user != "admin"){
        $dbuser->delete_user($pseudo);
        $result = true;
    }

}

echo json_encode($result);