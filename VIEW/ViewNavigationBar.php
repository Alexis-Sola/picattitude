<?php


class ViewNavigationBar
{
    public function nav_bar()
    {
        echo '
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <a class="navbar-brand" href="Accueil">Accueil</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <button class="btn btn-outline-dark" data-toggle="modal" data-target="#modal-add-pic">Importer une image</button>
      </li>
    </ul>
    <form class="form-inline col-md-5 col-md-offset-5">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="nav-item dropdown col-md-3 col-md-offset-3">
        <a class="dropdown-toggle" href="MonCompte" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mes infos
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