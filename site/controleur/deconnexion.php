<?php
if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    $racine = "..";
}
include_once "$racine/modele/authentification.inc.php";

// récupération des données GET, POST, et SESSION
// appel des fonctions permettant de récupérer les données utiles a l'affichage 
session_start();

// Détruire la session.
logout();
// traitement si nécessaire des données récupérées

// appel du script de vue qui permet de gérer l'affichage des données
$titre = "Deconnexion";
include "$racine/vue/entete.html.php";
include "$racine/vue/VueConfirmationLogout.php";
include "$racine/vue/pied.html.php";
