<?php


class ViewNavigationBar
{
    public function nav_bar($connected)
    {
        ?>
                <nav class="navbar navbar-expand-lg navbar-light bg-light" >
              <a class="navbar-brand" href="Accueil">pic_attitude(share)</a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                        if($connected != true){
                            ?>
                            <form class="form-inline ml-lg-auto" method="post" action="/JS/utils/search_by_keyword.php" id="form-search">
                                <input class="form-control mr-sm-2" type="search" placeholder="Recherche par mots clés" aria-label="Search" name="search-str">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="test">Rechercher</button>
                            </form>
                            <button class="btn btn-dark ml-auto btn-lg" data-toggle="modal" role="button" data-target="#modal-connec">
                                <strong>Connexion</strong>
                            </button>
                            <?php
                        }
                        else {
                            ?>
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <button class="btn btn-outline-dark mr-auto" data-toggle="modal" data-target="#modal-add-pic">Importer une image</button>
                                </li>
                            </ul>
                            <form class="form-inline mr-lg-auto" method="post" action="/JS/utils/search_by_keyword.php" id="form-search">
                                <input class="form-control mr-sm-2" type="search" placeholder="Recherche par mots clés" aria-label="Search" name="search-str">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="test">Rechercher</button>
                            </form>

                            <div class="btn-group">
                                <button class="btn btn-dark btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <strong><?php  echo $_SESSION['pseudo'] ?></strong>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="SharedPics">Images partagées</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" id="deco"><strong>Déconnexion</strong></a>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
              </div>
            </nav>
        <?php
    }
}