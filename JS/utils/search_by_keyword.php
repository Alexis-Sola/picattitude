<?php

include_once '../../MODEL/DbSearch.php';
include_once '../../MODEL/DbConnection.php';
include_once '../../VIEW/ViewCard.php';
include_once '../../MODEL/DbUsers.php';

session_start();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$dbConnec = new DbConnection();
$db = $dbConnec->connection();
$dbSearch = new DbSearch($db);
$dbUser = new DbUsers($db);
$cards = new ViewCard();

$string = $_POST['search-str'];
$result = $dbSearch->search_by_keyword($string);

echo json_encode($result);


