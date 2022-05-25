<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/bd.resto.inc.php";
include_once "$racine/modele/authentification.inc.php";

// création du menu burger
$menuBurger = array();
$menuBurger[] = array("url" => "./?action=recherche&critere=nom", "label" => "Recherche par nom");
$menuBurger[] = array("url" => "./?action=recherche&critere=adresse", "label" => "Recherche par adresse");

// critère de recherche par défaut
$critere = "nom";
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}
// récupération des données GET, POST, et SESSION
// recherche par nom
$nomR = "";

if (isset($_POST["nomR"])) {

    $nomR = $_POST["nomR"];
}

$voieAdrR = "";

if (isset($_POST["voieAdrR"])) {

    $voieAdrR = $_POST["voieAdrR"];
}

$cpR = "";

if (isset($_POST["cpR"])) {

    $cpR = $_POST["cpR"];
}

$villeR = "";

if (isset($_POST["villeR"])) {

    $villeR = $_POST["villeR"];
}

// appel des fonctions permettant de récupérer les données utiles a l'affichage 
// Si on provient du formulaire de recherche : $critere indique le type de recherche à effectuer
if (!empty($_POST)) {
    switch ($critere) {
        case 'nom':
            // recherche par nom
            $listeRestos = getRestosByNomR($nomR);
            break;
        case 'adresse':
            // recherche par adresse
            $listeRestos = getRestosByAdresse($voieAdrR, $cpR, $villeR);
            break;
    }
}
$titre = "Recherche d'un restaurant";

include "$racine/vue/entete.html.php";

include "$racine/vue/vueRechercheResto.php";

if (!empty($_POST)) {

    // affichage des resultats de la recherche

    include "$racine/vue/vueResultRecherche.php";
}

include "$racine/vue/pied.html.php";
