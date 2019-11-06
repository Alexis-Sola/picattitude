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
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="../JS/jquery-3.3.1.min.js"></script>
            <script src="../JS/validateConnexion.js"></script>
            <script src="../JS/validateInscription.js"></script>
            <script src="../JS/deconnexion.js"></script>
            <script src="../JS/affichageGeneral.js"></script>
            <script src="../JS/redirectIsConnected.js"></script>
            <script src="../JS/add_pictures.js"></script>
            <script src="/JS/validate_addpic.js"></script>

        <?php
            if ($script != NULL) {
                ?>
                <script src="../JS/<?php echo $script; ?>.js"></script>
                <?php
            }
            ?>
            <link rel="icon" type="image/x-icon" href="../image/photo-camera.png"/>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
                    crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="../style.css">
        </head>
        <body>
        <form method="post" action="../JS/utils/login.php" id="formconnec">
        </form>
        <form method="post" action="../JS/utils/inscription.php" id="forminsc">
        </form>
        <?php
    }


    public function footer_file()
    {
        ?>
        <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
            <div class="container text-center">
                <small>Copyright &copy; Your Website</small>
            </div>
        </footer>
        </body>
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