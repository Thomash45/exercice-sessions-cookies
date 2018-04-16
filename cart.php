<?php

// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['loginname']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: login.php');
    exit();
}

if (isset($_GET["vider"]))
{
    $_SESSION["panier"] = array();

}
if (isset($_GET["sessionend"]))
{
    session_unset();

}
?>

<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">

        <h1 class="text-center">Contenu du panier :</h1><br><br>
        <?php
        $mnms = 0;
        $cookieChocolate = 0;
        $chips = 0;
        $penauts = 0;

        //afficher le contenu de la session
        if (!empty($_SESSION["panier"]))
        {
            foreach ($_SESSION["panier"] as $value){

                if ($value==32) {
                    $mnms +=1;
                }
                if ($value==58) {
                    $cookieChocolate +=1;
                }
                if ($value==36) {
                    $chips +=1;
                }
                if ($value==46) {
                    $penauts +=1;
                }

            }

            if ($mnms > 0){

                echo '<h4 class="text-center">M&M\'s cookies ='.$mnms.'</h4><br>';
            }

            if ($cookieChocolate > 0){

                echo '<h4 class="text-center">Chocolate cookie ='.$cookieChocolate.'</h4><br>';
            }

            if ($chips > 0){

                echo '<h4 class="text-center">Chocolate chips ='.$chips.'</h4><br>';
            }

            if ($penauts > 0){

                echo '<h4 class="text-center">Pecan nuts ='.$penauts.'</h4><br>';
            }


        }
        ?>
<br><br>
        <div class="text-center"><a href="cart.php?vider=1" class="btn-lg btn-primary">vider le panier</a></div>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
