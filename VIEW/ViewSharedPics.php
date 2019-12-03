<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 15/03/2019
 * Time: 23:42
 */

class ViewSharedPics
{

    public function head_table(){
        echo'
        <table class="table table-hover m-auto"  style="width: 80%;"> 
          <thead class="black white-text text-center">
            <tr>
              <th scope="col">
              <h3 style="color: white">
                #
              </h3>
               </th>
              <th scope="col">
              <h3 style="color: white">
                Image
              </h3>
              </th>
              <th scope="col">
              <h3 style="color: white">
                Suppression
              </h3>
            </th>
            </tr>
          </thead>
          <tbody class="body-table text-center">';
    }

    public function table_user_account($cpt, $name, $pseudo, $rank, $color, $iduser){
        echo '
    <tr>
      <th scope="row">'. $cpt .'</th>
      <td>
       <div class="view" style="margin-left: 15em">
        <img width="80em" height="80em" class="img-fluid test" src="/image/' . $name . '" alt="Card image cap">
         <a href="/image/' . $name . '">
              <div class="mask rgba-white-slight"></div>
         </a>
        </div>
      </td>
      <td>
      <form method="post" action="/JS/utils/supprimerPhoto.php" class="form-rm-pic">  
        <input type="hidden" value="'.$iduser.'" name="id-user"/>
        <button type="submit" class="btn btn-elegant btn-block btn-lg">
            Supprimer l\'image de [<span  class="'. $color .'-text"><b>'. $rank .'</b></span>]<b> '.$pseudo.'</b>
         </button>
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