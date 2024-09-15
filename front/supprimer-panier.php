<?php   

session_start();

if (!isset($_SESSION['user'])){
  

  header('location:../connexion.php');
}


$id = $_POST['id'];
$idUser = $_SESSION['user']['id'];
   
    
unset ( $_SESSION ['panier'][$idUser] [$id]);


header('location:/pratique/front/panier.php');

  ?>