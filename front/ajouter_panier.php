<?php   

session_start();

if (!isset($_SESSION['user'])){
  

  header('location:../connexion.php');
}


$id = $_POST['id'];

$qty = $_POST ['qty'];

$idUser = $_SESSION['user']['id'];

if (!isset($_SESSION ['panier'][$idUser])){

 $_SESSION['panier'][$idUser] = []; 
}


if ($qty == 0 ) {

  unset ( $_SESSION ['panier'][$idUser] [$id]);



}

 else {
  $_SESSION ['panier'][$idUser] [$id] =  $qty ;

 }


  header("location:produit.php?id=$id");


  ?>