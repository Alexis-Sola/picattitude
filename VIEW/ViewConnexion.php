<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 10:09
 */


class ViewConnexion
{
    public function createConnexion(){
        ?>
            <h1 class="sans-nav" style="text-align: center">Connexion</h1>
            <form method="post" action="../JS/utils/login.php">
                <div id="erreur"></div>
            </form>
        <?php
    }
}