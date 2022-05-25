<?php

function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "listeRestos.php";
    $lesActions["liste"] = "listeRestos.php";
    $lesActions["detail"] = "detailResto.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["profil"] = "monProfil.php";
    $lesActions["deconnexion"] = "deconnexion.php";
    $lesActions["recherche"] = "rechercheResto.php";

    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}

?>