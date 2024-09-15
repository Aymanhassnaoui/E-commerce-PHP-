<?php   
 session_start();

 if (!isset($_SESSION['user'])){
  // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
  header('location:../connexion.php');
  exit; // Arrête l'exécution du script après la redirection
}
 $idUser = $_SESSION ['user']['id'];

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
    
   <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="index.php">liste  des Categories</a>

  </li> 


  <li class="nav-item ml-auto">
    <a class="nav-link active" aria-current="page" href="/pratique/index.php">Espace Admin</a>

  </li> 

 
 
 
<?php 
    
?>
     

<?php

    
     ?>
        

      </ul>
    </div>
    <a  class="btn float-end" href="panier.php">
    <i class="fa-solid fa-cart-shopping"></i>  Panier (<?php   
      ?>)</a>
  </div>
</nav>