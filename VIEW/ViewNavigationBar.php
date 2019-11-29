<?php


class ViewNavigationBar
{
    public function nav_bar()
    {
        echo '
            <nav class="navbar navbar-expand-lg navbar-light bg-light" >
              <a class="navbar-brand" href="Accueil">pic_attitude(share)</a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <button class="btn btn-outline-dark" data-toggle="modal" data-target="#modal-add-pic">Importer une image</button>
                  </li>
                </ul>
                <form class="form-inline col-md-5 col-md-offset-5" method="post" action="/JS/utils/search_by_keyword.php" id="form-search">
                  <input class="form-control mr-sm-2" type="search" placeholder="Recherche par mots clés" aria-label="Search" name="search-str">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="test">Rechercher</button>
                </form>
                <div class="nav-item dropdown col-md-2 col-md-offset-2">
                    <a class="btn btn-dark dropdown-toggle" href="MonCompte" role="button" data-toggle="dropdown"> 
                    <strong> ' . $_SESSION['pseudo'] . '</strong> 
                    </a> 
                    <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="MonCompte">Mon compte</a>
                      <div class="dropdown-divider"></div>
                      <form action="/JS/utils/deconnexion.php" method="post" id="formDeco">
                        <button class="dropdown-item" name="destroy" type="submit">Déconnexion</button>
                      </form>
                    </div>
                 </div>
              </div>
            </nav>
        ';
    }
}