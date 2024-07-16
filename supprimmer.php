<?php 

require_once 'include/database.php';
$id = $_GET['id'];
$sqlstate =  $pdo->prepare('DELETE FROM categorie  WHERE  id=?');
    $supprimer = $sqlstate->execute([$id]);

if($supprimer) {

    header('location:liste_categories.php');

}else {

    echo "error  de la  suppression ";
}
?>