<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 02/03/19
 * Time: 10:11
 */

class StartEnd
{

    public function head_file($title, $script = NULL)
    {
        ?>
        <!DOCTYPE html>
        <head lang="fr">
            <meta charset="utf-8">
            <title><?php echo $title; ?></title>
            <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
            <!-- Bootstrap core CSS -->
            <link href="/css/css/bootstrap.min.css" rel="stylesheet">
            <!-- Material Design Bootstrap -->
            <link href="/css/css/mdb.min.css" rel="stylesheet">
            <!-- Your custom styles (optional) -->
            <script type="text/javascript" src="/css/js/popper.min.js"></script>
            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript" src="/css/js/bootstrap.min.js"></script>
            <!-- MDB core JavaScript -->
            <script type="text/javascript" src="/css/js/mdb.min.js"></script>
            <link href="/style.css" rel="stylesheet">
            <script src="../JS/jquery-3.3.1.min.js"></script>
            <script src="../JS/validateConnexion.js"></script>
            <script src="../JS/validateInscription.js"></script>
            <script src="../JS/deconnexion.js"></script>
            <script src="../JS/validate_search.js"></script>
            <script src="/JS/validate_addpic.js"></script>

        <?php
            if ($script != NULL) {
                ?>
                <script src="/JS/<?php echo $script; ?>.js"></script>
                <?php
            }
            ?>
            <link rel="icon" type="image/x-icon" href="../image/icone.png"/>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                    crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="../style.css">
        </head>
        <body>
        <div id="bg-image"></div>
        <form method="post" action="../JS/utils/login.php" id="formconnec">
        </form>
        <form method="post" action="../JS/utils/inscription.php" id="forminsc">
        </form>
        <div id="global">
        <?php
    }


    public function footer_file()
    {
        ?>
        </div>
        <!-- Footer -->
        <footer class="page-footer font-small special-color-dark pt-4">

            <!-- Footer Elements -->
            <div class="container">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6 mb-4">

                        <!-- Form -->
                        <form class="form-inline">
                            <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
                                   aria-label="Search">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </form>
                        <!-- Form -->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6 mb-4">

                        <form class="input-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Your email"
                                   aria-label="Your email" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-outline-white my-0" type="button">Sign up</button>
                            </div>
                        </form>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </div>
            <!-- Footer Elements -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">© 2019 Copyright:
                <a href="https://github.com/Alexis-Sola">Compte github</a>
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->
        <?php
    }

    public function formaction_deconnection_navbar()
    {
        ?>
        <form action="" method="post" id="formDeco">
            <div id="navbar"></div>
        </form>
        <?php
    }

}