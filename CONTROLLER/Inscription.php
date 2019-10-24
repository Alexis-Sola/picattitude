<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 11:26
 */

include_once 'VIEW/ViewInscription.php';
include_once 'VIEW/StartEnd.php';

class Inscription implements Display
{
    private $startEnd;
    private $viewInscription;

    /**
     * Connexion constructor.
     */
    public function __construct()
    {
        $this->startEnd = new StartEnd();
        $this->viewInscription = new ViewInscription();
    }


    public function Display($data = [])
    {
        $this->startEnd->start('Inscription', 'validateInscription');
        $this->viewInscription->createInscription();
        $this->startEnd->end();
    }

}