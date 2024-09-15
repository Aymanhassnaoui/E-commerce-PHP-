<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" >
   
    <title>Page Panier</title>
</head>
<body>
<?php include '../include/navfront.php' ?>

<div class="container  my-2"> 
    <h1> Mon panier
 <i class="fa-solid fa-shop"> :</i></h1>
    <div class="row">
    <?php 
    $idUser = $_SESSION['user']['id']; 

    if (!isset($_SESSION['panier'][$idUser])) {
        // Si le panier n'existe pas encore, l'initialiser comme un tableau vide
        $_SESSION['panier'][$idUser] = [];
    }
    $panier =  $_SESSION ['panier'][$idUser] ;
    $totale =0;
    ?>  
    <?php
   if (empty($panier)) {
    echo '<div class="alert alert-warning" role="alert">Votre panier est vide</div>';
} else {
    $idproduit = array_keys($panier);
    require_once '../include/database.php';
    $ids = implode(',', array_fill(0, count($idproduit), '?'));

    $sqlstate = $pdo->prepare('SELECT * FROM produit WHERE id IN (' . $ids . ')');
    $sqlstate->execute($idproduit);
    $produits = $sqlstate->fetchAll();

?>   
        <table class="table table-hover  my-4 ">
        <thead>
        


          <tr>
          <th scope="col">Image</th>
            <th scope="col">Nom de produit</th>
            <th scope="col">Gty</th>
            <th scope="col">Prids</th>
            <th scope="col">Prix</th>
            <th scope="col">Totale</th>
            
          </tr>
        </thead>
        <?php
     
        foreach ($produits as $produit)  {
            $idProduit = $produit['id'];
           
        $totaleProduit=  $produit['prix']*  $panier [$produit['id']] ;
        $totale += $totaleProduit;
        ?> 
            
     
          <tr>
         <td> <img width = "70px"  src="../upload/produit/<?php echo $produit['image']; ?>" alt="<?php echo $produit['libelle']; ?>"></td>
            <td><?php echo $produit['libelle'] ?></td>
            <td> <button class="btn btn-success"><?php  echo $panier [$produit['id']]?></button></td>
            <td><a href="produit.php?id=<?php echo $produit['id']; ?>"><button class="btn btn-success mx-1">Modifier</button></a>  <form action="supprimer-panier.php" method="post" style="display:inline;">
        <input type="hidden" name="id" value="<?php echo $produit['id']; ?>">
        <button type="submit" class="btn btn-danger">Supprimer</button>
    </form></td>
            <td><?php echo $produit['prix'] ?>$</td>
            <td><?php  echo $totaleProduit ?> $</td>
            
       
       
        </tr>
        <?php }
    }
    ?>
        <tr>
        <th colspan="6" style="text-align: right;"> 

        <?php if (isset($_POST['vider']))  {

$_SESSION ['panier'][$idUser] = [];
header('location:panier.php');
        } ?>
           <?php  
if (!empty($panier)) {
    ?>

<form method = "post">

        <form method="post">
            <input onclick="return confirm('Vous voulez vraiment supprimer la catégorie ?')" type="submit" value="Vider le Panier" class="btn btn-danger my-2" name="vider">
            <input type="submit" value="Valider le Panier" class="btn btn-success my-2" name="valider">
        </form>
    </th>
    </tr>
    <?php
}
else {?>

    
    <?php
}
?>
        </table>
        
        <button type="button" class="btn btn-secondary btn-lg">Totale de ma commande    :    <?php  echo $totale ?>$</button>
      
    

   
  
</div>
</div>

</body>
</html>
