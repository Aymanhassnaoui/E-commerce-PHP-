<?php 

require_once 'include/database.php';
$id = $_GET['id'];
$sqlstate =  $pdo->prepare('DELETE FROM produit  WHERE  id=?');
    $supprimer = $sqlstate->execute([$id]);

if($supprimer) {

    header('location:produits.php');

}else {

    echo "error  de la  suppression ";
}
?>