<?php
include_once '../../MODEL/DbConnection.php';
include_once '../../MODEL/DbImages.php';

session_start();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$result = "Probleme avec le formulaire";

$error = false;

try {
    $bytes = random_bytes(16);
} catch (Exception $e) {
    echo 'Problem encounter';
}

$newName = bin2hex($bytes);
$legalExtensions = array("JPG", "PNG", "GIF", "JPEG");
$legalSize = 10000000;

$image = $_FILES['photo'];

$actualName = $image['name'];
$actualSize = $image['size'];
$descrip = $_POST['img-text'];
$titre = $_POST['titre'];

$extension = pathinfo($actualName, PATHINFO_EXTENSION);


if (strlen($titre) > 25) {
    $error = true;
    $result = "Titre trop long ! 25 caractères max !";
}

if (strlen($descrip) > 100) {
    $error = true;
    $result = "Description trop longue ! 100 caractère max !";
}

if (empty($actualName) || $actualSize === 0) {
    $error = true;
    $result = "Le fichier est vide";
} elseif (!(in_array(strtoupper($extension), $legalExtensions))) {
    $error = true;
    $result = "L'extension n'est pas bonne";
} elseif (file_exists('image/' . $newName . '.' . $extension)) {
    $error = true;
    $result = "Le fichier existe déjà";
} elseif (!($actualSize < $legalSize)) {
    $error = true;
    $result = "Fichier trop gros !";
}


if (!$error) {
    $connection = new DbConnection();
    $db = $connection->connection();
    $dbimage = new DbImages($db);

    $target = "../../image/" . $newName . '.' . $extension;

    $pseudo = $_SESSION['pseudo'];
    $id_user = $_SESSION['id_user'];
    $date = date('Y-m-d');

    $dbimage->insert_image($titre,  $descrip,$newName . '.' . $extension, $pseudo, $date, $id_user);

    if (move_uploaded_file($image['tmp_name'], $target)) {
        $result = "Photo ajouté avec succés";

    } else {
        $result = "Oups ça c'est mal passé quelque part, réessayez. ";
    }

}

echo json_encode($result);








