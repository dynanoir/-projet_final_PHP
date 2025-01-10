<?php 

$page = isset($_GET['page']) ? $_GET['page'] : 'accueil'; 

switch ($page) {
    case 'accueil':
        if (file_exists('src/View/accueil.php')) {
            include 'src/View/accueil.php';
        } else {
            echo "Page de accueil indisponible.";
        }
        break;
    case 'inscription':
        include 'src/View/inscription.php';
        break;
    case 'connexion':
        include 'src/View/connexion.php';
        break;
    case 'deconnexion':
        include 'src/View/deconnexion.php';
        break;
    default:
        include 'src/View/404.php';
}