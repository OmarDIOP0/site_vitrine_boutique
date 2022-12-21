<?php
if($_SESSION['prenom']){
    session_start();
    echo "Bienvenue".$_SESSION['prenom'];
    echo "Cliquez <a href='compte.html'>ici<a/> pour acceder au site et profitez de nos nouveautés";
    echo "<a href='connexion.php'>Se Deconnecter<a/>";
    }
    else{
        header('Location:connexion.php');
    }
?>