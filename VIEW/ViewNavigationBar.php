<?php


class ViewNavigationBar
{
    public function nav_bar($connected, $color, $rank = "user")
    {
        ?>
              <nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav">
              <a class="navbar-brand" href="Accueil">pic_attitude(share)</a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                        if($connected != true){
                            ?>
                            <div class="form-inline ml-lg-auto">
                            <form  method="post" action="/JS/utils/search_by_keyword.php" id="form-search">
                                <input class="form-control" type="search" placeholder="Votre recherche" name="search-str">
                                <button class="btn btn-outline-success" type="submit" name="validate-search">Rechercher</button>
                            </form>
                            </div>
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
                                <input class="form-control" type="search" placeholder="Votre recherche" name="search-str">
                                <button class="btn btn-outline-success" type="submit" name="validate-search">Rechercher</button>
                            </form>

                            <div class="btn-group">
                                <button class="btn btn-dark btn-lg dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                   [<span  class="<?php echo $color ?>-text"><b><?php echo $rank ?></b></span>] <b><?php echo $_SESSION['pseudo'] ?></b>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="SharedPics">Images partagées</a>
                                <?php
                                if($rank === "admin"){
                                    ?>
                                    <a class="dropdown-item" href="ModerateUsers">Utilisateurs</a>
                                    <?php
                                }
                                elseif ($rank ==="modo"){
                                    ?>
                                    <a class="dropdown-item" href="ModerateUsers">Utilisateurs</a>
                                    <?php
                                }
                                ?>
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