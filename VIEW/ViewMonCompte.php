<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 15/03/2019
 * Time: 23:42
 */

class ViewMonCompte
{

    public function createmain(){
        echo'
                  <div id="imagessuppr">
                         <h1 style="text-align: center; color: white; margin-top: 1em">Mes images</h1>
                         <div id="cardsuppr" class="mx-auto"></div>
                </div>';
    }

    public function head_table(){
        echo'
        <table class="table align-self-center table-hover" style="width: 75%; margin-top: 2em; margin-left: 13%"> 
          <thead class="black white-text">
            <tr>
              <th scope="col">N° de l\'image</th>
              <th scope="col">Image</th>
              <th scope="col">Cocher</th>
              <th scope="col">Supprimer</th>
            </tr>
          </thead>
          <tbody class="body-table align-content-center">';
    }

    public function table_user_account($user, $name){
        echo '
    <tr>
      <th scope="row">'. $user .'</th>
      <td>
       <div class="view">
        <img width="50em" height="50em" class="img-fluid test" src="/image/' . $name . '" alt="Card image cap">
         <a href="/image/' . $name . '">
              <div class="mask rgba-white-slight"></div>
         </a>
        </div>
      </td>
      <td><input type="checkbox" class="custom-control-input " id="tableDefaultCheck1">
          <label class="custom-control-label" for="tableDefaultCheck1">Supprimer</label></td>
      <td>
      <form method="post" action="/JS/utils/supprimerPhoto.php" id="form-rm-pic">  
        <input type="hidden" value="'.$user.'" name="id-user"/>
        <button type="submit" class="btn btn-indigo">Supprimer</button>
      </form>
      </td> 
    </tr>
    
';
    }

    public function close_tab(){
        echo '  
        </tbody>
        </table>';
    }
}