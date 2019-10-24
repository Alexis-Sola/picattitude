<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 16/03/2019
 * Time: 00:39
 */

include_once '../../MODEL/DbConnection.php';
include_once '../../MODEL/DbImages.php';

session_start();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$connection = new DbConnection();
$db = $connection->connection();
$dbimage = new DbImages($db);

$result = false;

if(isset($_POST['idCard'])){
    header("Location: https://share-pics.alwaysdata.net/MonCompte");
    $idImage = $_POST['idCard'];
    $result = $dbimage->getImageId($idImage);
    $name =  "../../image/" . $result['name'];
    unlink($name);
    $dbimage->deleteImage($idImage);
    $result = true;
}

echo json_encode($result);