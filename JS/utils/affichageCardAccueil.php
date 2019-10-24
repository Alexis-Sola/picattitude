<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 16/03/2019
 * Time: 23:55
 */

include_once '../../MODEL/DbConnection.php';
include_once '../../MODEL/DbImages.php';

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$connection = new DbConnection();
$db = $connection->connection();
$dbImages = new DbImages($db);

$result = $dbImages->getAllImages();

echo json_encode($result);


