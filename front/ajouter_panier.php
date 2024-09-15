<?php   
session_start();

// Vérification si l'utilisateur est connecté
if (!isset($_SESSION['user'])){
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header('location:../connexion.php');
    exit; // Arrête l'exécution du script après la redirection
}

$id = $_POST['id'];
$qty = $_POST['qty'];

$idUser = $_SESSION['user']['id'];

// Vérification si le panier pour cet utilisateur est défini
if (!isset($_SESSION['panier'][$idUser])){
    $_SESSION['panier'][$idUser] = []; 
}

// Si la quantité est 0, supprimer l'article du panier
if ($qty == 0) {
    unset($_SESSION['panier'][$idUser][$id]);
} else {
    // Sinon, mettre à jour ou ajouter l'article avec la nouvelle quantité
    $_SESSION['panier'][$idUser][$id] = $qty;
}

// Redirection vers la page produit
header("location:produit.php?id=$id");
exit; // Assurez-vous également que ce script s'arrête après cette redirection
?>
