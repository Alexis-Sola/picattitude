<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 09:32
 */

session_start();

class ViewAccueil
{

    public function show_pictures_index(){
        ?>
        <div id="images">
            <h1 style="text-align: center; color: white; margin-top: 1em">Images partagées</h1>
            <div id="card" class="mx-auto"></div>
        </div>
        <?php
    }

}