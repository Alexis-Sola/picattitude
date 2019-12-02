<?php


class ViewModalConnec
{
    public function modal_connexion()
    {
        echo '
        <div class="modal fade text-center" id="modal-connec" tabindex="-1" role="dialog" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Connexion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>  
              <form method="post" action="../JS/utils/login.php" id="form-connec">
              <div class="modal-body">
                <div id="retour-connec"> </div>   
                  <input type="text" class="form-control mb-4" name="pseudo" placeholder="Pseudo" />
                  <input type="password" class="form-control mb-4" name="password" placeholder="Mot de passe" />  
                  <div>
                    <a href="">Mot de passe oublié ?</a>
                  </div>
                  <button class="btn btn-secondary btn-lg btn-block mb-4" 
                  name="action" id="validate-connec" style="margin-top: 1em">Connexion</button>
                  <a class="btn btn-dark btn-lg btn-block" data-toggle="modal" role="button" data-target="#modal-insc">Inscription</a>
              </div>  
              </form>
            </div>
          </div>
        </div> 
        ';
    }

    public function modal_insc(){
        echo '
        <div class="modal fade text-center" id="modal-insc" tabindex="-1" role="dialog" >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Inscription</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>  
              <form id="form-insc">
              <div class="modal-body">
                <div id="retour-insc"> </div>   
                  <input type="text" class="form-control mb-4" name="login" placeholder="Pseudo" />
                  <input type="password" class="form-control mb-4" name="pass1" placeholder="Mot de passe" /> 
                  <input type="password" class="form-control mb-4" name="pass2" placeholder="Vérification du mot de passe" /> 
                  <input type="text" class="form-control mb-4" name="mail" placeholder="Mail" /> 
                  <button class="btn btn-secondary btn-lg btn-block mb-4" 
                  name="action" id="validate-insc" style="margin-top: 1em">Inscription</button>
                   <a class="btn btn-dark btn-lg btn-block" data-dismiss="modal">Retour connexion</a>
              </div>  
              </form>
            </div>
          </div>
        </div> 
        ';
    }
}