<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modifier Produit</title>
</head>
<body>


<div class="container py-2"> 

<h4>Modifier le Produit</h4>
<?php
   require_once 'include/database.php';
  
   $sqlstate =  $pdo->prepare('SELECT * FROM produit  WHERE  id=?');
   $id = $_GET['id'];
       $sqlstate->execute([$id]);
   $produit =   $sqlstate->fetch();

   if (isset($_POST['Modifier'])) {
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $discount=  $_POST['Discount'];
    $categorie = $_POST ['categorie'];

    if (!empty($libelle) && !empty($descreption) && !empty($prix)) {


     
        $sql = $pdo->prepare('UPDATE produit 
        SET 
        libelle = ?, 
        
        description = ? ,
        
         prix = ?,

          Discount = ?,

          categorie = ?
        
          WHERE id = ?');
        $sql->execute([$libelle, $prix, $discount ,$categorie , $id ]); 
        header('location:produits.php');
        ?>

        <div class="alert alert-success" role="alert">
                            Your categorie is registered.
                        </div>
        
        <?php   
        }else {
           ?>
        
                    <div class="alert alert-danger" role="alert">
                    libelle and description are required.
                    </div>
        
        <?php
        
        
            }}
        
    
        
        ?>
   

   <form method="post">
        <label class="form-label">libelle	</label>
        <input type="text" class="form-control" name="libelle"     value = <?php echo $produit ['libelle'] ?>>

        <label class="form-label">Prix</label>
        <input type="number" class="form-control"   step = "0.1"  name="prix"   min="0"    value = <?php echo $produit ['prix'] ?>>

        <label class="form-label">Discount</label>
        <input type="number" class="form-control" name="Discount"   min="0" max="90" value = <?php echo $produit ['discount'] ?>>
<input type="submit" value="modifier produit " class="btn btn-primary my-2" name="Modifier">

    </form>
</div>

</body>
</html>
