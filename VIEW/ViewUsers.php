<?php


class ViewUsers
{
    public function head_table(){
        echo'
        <table class="table align-self-center table-hover" style="width: 75%; margin-top: 2em; margin-left: 13%"> 
          <thead class="black white-text">
            <tr>
              <th scope="col">Nom utilisateur</th>
              <th scope="col">Adresse IP</th>
              <th scope="col">Actions</th>
              <th scope="col">Supprimer/Bannir</th>
            </tr>
          </thead>
          <tbody class="body-table align-content-center">';
    }

    public function table_user_account($pseudo, $ipaddr){
        echo '
    <tr>
      <th scope="row">'. $pseudo .'</th>
      <th scope="row">'. $ipaddr .'</th>
      <td>
          <input type="checkbox" class="custom-control-input">
          <label class="custom-control-label" for="tableDefaultCheck1"></label>
      </td>
      <td>
          <div class="btn-group dropright">
            <button type="button" class="btn btn-primary">Choisir une action</button>
            <button type="button" class="btn btn-primary dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            <span class="sr-only">Toggle Dropdown</span>
            </button>
              <div class="dropdown-menu">
                <a class="dropdown-item">Supprimer</a>
                <a class="dropdown-item">Bannir</a>
              </div>
           </div>
        <input type="hidden" value="'.$pseudo.'" name="pseudo-suppr"/>
        <button type="submit" class="btn btn-indigo">Supprimer</button>
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