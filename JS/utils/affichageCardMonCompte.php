<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 02/04/2019
 * Time: 12:28
 */

include_once '../../MODEL/DbConnection.php';
include_once '../../MODEL/DbImages.php';

session_start();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$connection = new DbConnection();
$db = $connection->connection();
$dbImages = new DbImages($db);

$result = $dbImages->getImageUser($_SESSION['user_id']);

echo json_encode($result);
