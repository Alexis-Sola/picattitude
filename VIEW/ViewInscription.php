<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 11:05
 */

class ViewInscription
{

    public function createInscription(){
        ?>
        <h1 style="margin-left: 40%">Inscription</h1>
        <form action="../JS/utils/inscription.php" method="post">
            <div style="height: 200px; width: 200px; margin-left: 40%">
                <div id="erreur"></div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Login</label>
                    <input  name="login" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter login">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="pass" type="password" class="form-control"  placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mail</label>
                    <input name="mail" type="email" class="form-control" placeholder="Enter mail">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input name="name" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter last name">
                </div>
                <button name="action" type="submit" class="btn btn-primary">Inscription</button>
            </div>
        </form>
        <?php
    }

}