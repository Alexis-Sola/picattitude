<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 10:21
 */

include_once 'VIEW/StartEnd.php';
include_once 'VIEW/ViewConnexion.php';
include_once 'Display.php';

class Connexion implements Display
{
    private $startEnd;
    private $viewConnexion;

    /**
     * Connexion constructor.
     */
    public function __construct()
    {
        $this->startEnd = new StartEnd();
        $this->viewConnexion = new ViewConnexion();
    }

    public function Display($data = [])
    {
        $this->startEnd->head_file('Connexion', 'validateConnexion');
        $this->viewConnexion->createConnexion();
        $this->startEnd->footer_file();
    }
}