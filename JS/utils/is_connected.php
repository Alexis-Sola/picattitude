<?php
/**
 * Created by PhpStorm.
 * User: s17018568
 * Date: 27/02/19
 * Time: 09:17
 */

session_start();

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode(isset($_SESSION['user_id']));
