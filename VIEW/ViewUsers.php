<?php


class ViewUsers
{
    public function head_table(){
        echo'
        <table class="table table-hover m-auto" style="width: 80%; margin-top: 3em;"> 
          <thead class="black white-text text-center">
            <tr>
              <th scope="col">#</th> 
              <th scope="col">Supprimer</th> 
              <th scope="col">Bannir</th> 
              <th scope="col">Adresse IP</th>
            </tr>
          </thead>
          <tbody class="body-table">';
    }

    public function table_user_account($pseudo, $ipaddr, $cpt, $rank, $color){
        echo '
    <tr>
      <td>'. $cpt .'</td>
      <td>
        <form method="post" action="/JS/utils/delete_account.php" class="form-rm-account">                     
             <input type="hidden" value="'. $pseudo . '" name="pseudo-suppr"/>
             <button type="submit" class="btn btn-lg btn-block">Supprimer le compte 
                [<span  class="'. $color .'-text"><b>'. $rank .'</b></span>]<b> '.$pseudo.'</b>
             </button>
        </form>
        
        <td>
            <button class="btn btn-danger btn-lg btn-block">Bannir 
                [<span class="'. $color .'-text"><b>'. $rank .'</b></span>]<b> '.$pseudo.'</b>
            </button>  
       </td>         
      <td><a class="btn btn-warning btn-lg btn-block">'. $ipaddr .'</a></td> 
    </tr>
    
';
    }

    public function close_tab(){
        echo '  
        </tbody>
        </table>';
    }

}