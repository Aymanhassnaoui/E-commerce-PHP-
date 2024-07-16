<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>liste des Produits</title>
</head>
<body>
<?php include 'include/nav.php' ?>

<div class="container py-2"> 

<table class="table  table-hover">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">libelle</th>
      <th scope="col">Prix</th>
      <th scope="col">Discount</th>
      <th scope="col">Date de création</th>
    </tr>
  </thead>
  <tbody>

  
  <?php  
 require_once 'include/database.php';

 $produits = $pdo->query('SELECT * FROM produit' )->fetchAll(PDO::FETCH_ASSOC);
  foreach ( $produits as $produit ) {
   ?>
   <tr>
      <th scope="row"> <?php  echo  $produit ['id'] ?></th>
      <td><?php  echo  $produit ['libelle'] ?></td>
      <td><?php  echo  $produit ['prix'] ?></td>
      <td><?php  echo  $produit ['discount'] ?></td>
      <td><?php  echo  $produit ['date_creation'] ?></td>
      <td>
      <a href="supprimmerProduit.php?id=<?php echo $produit ['id'] ?>"  onclick= "return   confirm('vous voulez vraiment supprimer le produit <?php echo $produit['libelle'] ?> ' )" class="btn btn-danger">Supprimmer</a>
      <a href="modifierProduit.php?id=<?php echo   $produit ['id'] ?>"class="btn btn-primary">Modifier </a>
   
      </td>
    </tr>
    
   <?php

  }


   ?> 
   
   
  </tbody>

</table>
    
</div>

</body>
</html>
