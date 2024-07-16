<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" >
   
    <title>Page d'accueil</title>
</head>
<body>

<?php require_once '../include/database.php' ?>

<?php include '../include/navfront.php' ?>

<div class="container py-2"> 
    <h4> Listes des categories</h4>
<?php  
     $categories = $pdo->query('SELECT * FROM categorie' )->fetchAll(PDO::FETCH_ASSOC);
   ?>
   
   <?php  
 foreach ($categories as $categorie) {
   ?> 
<ul class="list-group">

  <li class="list-group-item"> 
    
  <a  class = "btn btn-light"  href="categorie.php?id=<?php  echo  $categorie ['id'] ?>">
     <?php  echo  $categorie ['libelle'] ?>
  </a>
   </li>
 
</ul>
<?php } ?>
</div>

</body>
</html>
