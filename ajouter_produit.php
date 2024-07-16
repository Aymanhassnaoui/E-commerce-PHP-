<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ajouter catégorie</title>
</head>
<body>
<?php 
  require_once 'include/database.php';


include 'include/nav.php' 


?>

<div class="container py-2"> 

<h4>Ajouter un Produit</h4>
<?php
   if (isset($_POST['ajouter'])) {
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $discount=  $_POST['Discount'];
    $categorie = $_POST ['categorie'];
    $description = $_POST ['description'];

  $filename = "produit.png";

   if (!empty($_FILES['image']['name'])){

     $image = $_FILES['image']['name'];
     $filename = uniqid().$image;
     move_uploaded_file( $_FILES['image']['tmp_name'], 'upload/produit/'.$filename );
   }

 
   

    if (!empty($libelle) && !empty($prix) && !empty($categorie)) {
       
        require_once 'include/database.php';
        $date = date('Y-m-d'); 
        $sql = $pdo->prepare('INSERT INTO produit VALUES (null, ?, ?, ?,?,?,?,?)');
     $sql->execute([$libelle, $prix, $discount ,$categorie ,$date ,$description,$filename]);

        ?>

<div class="alert alert-success" role="alert">
                    Your produits is registered.
                </div>

<?php   
    }else {
   ?>

            <div class="alert alert-danger" role="alert">
            libelle or prix or categorie are required.
            </div>

<?php


    }


}
?>

<form method="post" enctype="multipart/form-data">
        <label class="form-label">libelle	</label>
        <input type="text" class="form-control" name="libelle">

        <label class="form-label">Prix</label>
        <input type="number" class="form-control"   step = "0.1"  name="prix"   min="0">

        <label class="form-label">description</label>
        <textarea class="form-control" name="description"></textarea>
         
        <label class="form-label">Discount</label>
        <input type="number" class="form-control" name="Discount"   min="0" max="90">


        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image"   min="0" max="90">
        <pre>
  <?php  
  $categories = $pdo->query('SELECT * FROM categorie' )->fetchAll(PDO::FETCH_ASSOC);

    ?>

</pre>
<label class="form-label">Choisir une catégorie:</label>
<select name = "categorie"  class = "form-control">


<?php
foreach ($categories as $categorie) {
    echo "<option value='" . ($categorie['id']) . "'>" .($categorie['libelle']) . "</option>";
}
?>

</select>
         
        <input type="submit" value="Ajouter produit " class="btn btn-primary my-2" name="ajouter">

    </form>
</div>

</body>
</html>
