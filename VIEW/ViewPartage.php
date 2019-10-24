<?php
/**
 * Created by PhpStorm.
 * User: s17018568
 * Date: 08/03/19
 * Time: 14:25
 */

class ViewPartage
{

    public function showGreatResult($result){
        echo '<div class="alert alert-primary" role="alert">
  '.$result.'
</div>';
    }

    public function showBadResult($result){
        echo'<div class="alert alert-danger" role="alert">'.$result.'</div>';
    }

    public function showPartage(){
        ?>
        <div class="mx-auto" id="ajoutPhoto">
        </div>
        <?php
    }

}