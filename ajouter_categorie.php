<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ajouter catégorie</title>
</head>
<body>
<?php include 'include/nav.php' ?>

<div class="container py-2"> 

<h4>Ajouter une Catégorie</h4>
<?php
   if (isset($_POST['ajouter'])) {
    $libelle = $_POST['libelle'];
    $descreption = $_POST['description'];

    if (!empty($libelle) && !empty($descreption)) {
        require_once 'include/database.php';

        $date = date('Y-m-d'); 
        $sql = $pdo->prepare('INSERT INTO categorie VALUES (null, ?, ?, ?)');
        $sql->execute([$libelle, $descreption, $date]);

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


    }


}
?>

<form method="post">
        <label class="form-label">libelle	</label>
        <input type="text" class="form-control" name="libelle">

        <label class="form-label">description</label>
        <textarea class="form-control" name="description"></textarea>
         
        <input type="submit" value="Ajouter categories" class="btn btn-primary my-2" name="ajouter">

    </form>
  
</div>

</body>
</html>
