<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modifier catégorie</title>
</head>
<body>


<div class="container py-2"> 

<h4>Modifier la Catégorie</h4>
<?php
   require_once 'include/database.php';
  
   $sqlstate =  $pdo->prepare('SELECT * FROM categorie  WHERE  id=?');
   $id = $_GET['id'];
       $sqlstate->execute([$id]);
   $categorie =   $sqlstate->fetch();

   if (isset($_POST['Modifier'])) {
    $libelle = $_POST['libelle'];
    $descreption = $_POST['description'];

    if (!empty($libelle) && !empty($descreption)) {


     
        $sql = $pdo->prepare('UPDATE categorie 
        SET 
        libelle = ?, 
        
        description = ?   WHERE id = ?');
        $sql->execute([$libelle, $descreption, $id ]); 
        header('location:liste_categories.php');
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

<input type="hidden" class="form-control" name="id"  value = <?php echo $categorie ['id'] ?>>
        <label class="form-label">libelle	</label>
        <input type="text" class="form-control" name="libelle"  value = <?php echo $categorie ['libelle'] ?>>

        <label class="form-label">description</label>
        <textarea class="form-control" name="description"><?php echo $categorie ['description'] ?></textarea>
         
        <input type="submit" value="Modifier categories" class="btn btn-primary my-2" name="Modifier">

    </form>
  
</div>

</body>
</html>
