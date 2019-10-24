<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 10:11
 */

class StartEnd
{

    public function start($title, $script){
        ?>
        <!DOCTYPE html>
        <html lang="fr" xmlns:https="http://www.w3.org/1999/xhtml">
        <head>
            <meta charset="utf-8">
            <title><?php echo $title; ?></title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="../JS/jquery-3.3.1.min.js"></script>
            <script src="../JS/affichageGeneral.js"></script>
            <script src="../JS/deconnexion.js"></script>
            <script src="../JS/validateConnexion.js"></script>
            <script src="../JS/validateInscription.js"></script>
            <script src="../JS/<?php echo $script;?>.js"></script>
            <script src="../JS/redirectIsConnected.js"></script>
            <link rel="icon" type="image/x-icon" href="../image/photo-camera.png" />
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="../style.css">
        </head>
        <body>
        <form method="post" action="../JS/utils/login.php" id="formconnec">
           </form>
        <form method="post" action="../JS/utils/inscription.php" id="forminsc">
        </form>
        <?php
    }

public function startWith2Script($title, $script1, $script2){
    ?>
    <!DOCTYPE html>
    <head lang="fr">
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="../JS/jquery-3.3.1.min.js"></script>
        <script src="../JS/validateConnexion.js"></script>
        <script src="../JS/validateInscription.js"></script>
        <script src="../JS/deconnexion.js"></script>
        <script src="../JS/affichageGeneral.js"></script>
        <script src="../JS/<?php echo $script1;?>.js"></script>
        <script src="../JS/<?php echo $script2;?>.js"></script>
        <script src="../JS/redirectIsConnected.js"></script>
        <link rel="icon" type="image/x-icon" href="../image/photo-camera.png" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
<body>
    <form method="post" action="../JS/utils/login.php" id="formconnec">
    </form>
    <form method="post" action="../JS/utils/inscription.php" id="forminsc">
    </form>
    <?php
}

    public function end(){
        ?>
        <!-- Footer -->
        <footer class="page-footer font-small mdb-color lighten-3 pt-4">
            <!-- Footer Elements -->
            <div class="container">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-2 col-md-12 mb-4">
                        <!--Image-->
                        <div class="view overlay z-depth-1-half">
                            <img src="http://www.klik.amsterdam/upload/14981180607.gif" class="img-fluid" alt="">
                            <a href="">
                                <div class="mask rgba-white-light"></div>
                            </a>
                        </div>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <!--Image-->
                        <div class="view overlay z-depth-1-half">
                            <img src="http://www.laboiteverte.fr/wp-content/uploads/2014/06/gif-code-programme-03.gif" class="img-fluid" alt="">
                            <a href="">
                                <div class="mask rgba-white-light"></div>
                            </a>
                        </div>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <!--Image-->
                        <div class="view overlay z-depth-1-half">
                            <img src="https://66.media.tumblr.com/881d82e7b3645c5fafefe146955b891a/tumblr_opy997yh5I1qzt4vjo1_540.gif" class="img-fluid" alt="">
                            <a href="">
                                <div class="mask rgba-white-light"></div>
                            </a>
                        </div>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-2 col-md-12 mb-4">
                        <!--Image-->
                        <div class="view overlay z-depth-1-half">
                            <img src="https://media3.giphy.com/avatars/100soft/WahNEDdlGjRZ.gif" class="img-fluid" alt="">
                            <a href="">
                                <div class="mask rgba-white-light"></div>
                            </a>
                        </div>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <!--Image-->
                        <div class="view overlay z-depth-1-half">
                            <img src="https://colinbendell.cloudinary.com/image/upload/c_crop,f_auto,g_auto,h_350,w_400/v1512090971/Wizard-Clap-by-Markus-Magnusson.gif" class="img-fluid" alt="">
                            <a href="">
                                <div class="mask rgba-white-light"></div>
                            </a>
                        </div>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <!--Image-->
                        <div class="view overlay z-depth-1-half">
                            <img src="https://www.kizoa.fr/img/e8nZC.gif" class="img-fluid" alt="">
                            <a href="">
                                <div class="mask rgba-white-light"></div>
                            </a>
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Footer Elements -->
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2018 Copyright:
                <a href="https://share-pics.alwaysdata.net/"> share-pics</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
        <?php
    }

    public function navbar(){
        ?>
        <form action="../JS/utils/deconnexion.php" method="post" id="formDeco"><div id="navbar"> </div></form>
        <?php
    }

}