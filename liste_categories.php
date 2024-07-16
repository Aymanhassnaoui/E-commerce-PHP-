<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>liste des categories</title>
</head>
<body>
<?php include 'include/nav.php' ?>

<div class="container py-2"> 

<table class="table  table-hover">

  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">libelle</th>
      <th scope="col">Déscription</th>
      <th scope="col">Date de création</th>
    </tr>
  </thead>
  <tbody>

  
  <?php  
 require_once 'include/database.php';

 $categories = $pdo->query('SELECT * FROM categorie' )->fetchAll(PDO::FETCH_ASSOC);
  foreach ( $categories as $categorie ) {
   ?>
   <tr>
      <th scope="row"> <?php  echo  $categorie ['id'] ?></th>
      <td><?php  echo  $categorie ['libelle'] ?></td>
      <td><?php  echo  $categorie ['description'] ?></td>
      <td><?php  echo  $categorie ['date_creation'] ?></td>
      <td>
      <a href="supprimmer.php?id=<?php echo $categorie ['id'] ?>"  onclick= "return   confirm('vous voulez vraiment supprimer la categorie <?php echo $categorie['libelle'] ?> ' )" class="btn btn-danger">Supprimmer</a>
      <a href="modifier.php?id=<?php echo   $categorie ['id'] ?>"class="btn btn-primary">Modifier </a>
   
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
