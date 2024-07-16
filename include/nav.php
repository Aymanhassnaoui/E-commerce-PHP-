<?php  
session_start();
$connect = false ;

 if(isset($_SESSION['user']))

 {
$connect = true ;

 }



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
          <a class="nav-link active" aria-current="page" href="/pratique/index.php">Ajouter utilisateur</a>
        </li>
     <?php  if ($connect) {
    ?> 
   <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/pratique/liste_categories.php">liste  des Categories</a>

  </li> 

  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/pratique/produits.php">liste  des Produits</a>
  </li>
    <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/pratique/ajouter_categorie.php">Ajouter Categorie</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/pratique/ajouter_produit.php">Ajouter Produit</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/pratique/deconnexion.php">Déconnexion</a>
  </li>
<?php 
     }else {
?>
      <li class="nav-item">
      <a class="nav-link" href="/pratique/connexion.php">connexion</a>
    </li>

<?php

     }
     
     ?>
        

      </ul>
    </div>
  </div>
</nav>