
<?php require_once '../include/database.php';
  
  
   $sqlstate =  $pdo->prepare('SELECT * FROM categorie  WHERE  id=?');
   $id = $_GET['id'];
       $sqlstate->execute([$id]);
   $categorie =   $sqlstate->fetch();




   $sqlstate =  $pdo->prepare('SELECT * FROM produit  WHERE id_categorie=?');
   $id = $_GET['id'];
       $sqlstate->execute([$id]);
   $produits =   $sqlstate->fetchall();
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title> categorie | <?php echo  $categorie ['libelle']  ?></title>
</head>
<body>
    
<?php include '../include/navfront.php' ?>
<div class="container py-2"> 
    <h4>  Categorie : <?php echo  $categorie ['libelle']  ?></h4>
    <div class= "row">
    <?php  
 foreach ($produits as $produit) {
   ?> 
    <div class="col-sm-3  mb-3">
    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="../upload/produit/<?php echo  $produit ['image']  ?> " width = 286px;
  height =  198px; alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo  $produit ['libelle']  ?></h5>
    <p class="card-text"><?php echo  $produit ['prix']  ?> $</p>
    <a  href="produit.php?id=<?php  echo  $produit ['id'] ?>" class="btn btn-primary  stretched-link">Afficher les details</a>
  </div>

  <div class="card-footer" style="z-index: 10;">
  <form method = "post"  action = "panier.php">
<div class=" product counter d-flex">

   <button type="button"   class="decrement btn btn-primary mx-1">-</button>
   <input type="hidden"  name = "id"   class=" form-control" value= <?php echo  $produit ['id']  ?> >
    <input type="number"     class="numberInput form-control" value="1"  name = "qty"  id = "qty" min="1"  max ="99" >
    <button type="button" class="increment btn btn-primary mx-1">+</button>
    <input type="submit" class=" btn btn-primary mx-1"  value =  "ajouter "  name =  "ajouter">
 </div>
 </form>

  </div>  
</div>
</div>

<?php } ?>
</div>
<script>document.addEventListener('DOMContentLoaded', (event) => {
    // Sélectionner tous les éléments de la classe
    const products = document.querySelectorAll('.product');

    products.forEach(product => {
        const numberInput = product.querySelector('.numberInput');
        const incrementButton = product.querySelector('.increment');
        const decrementButton = product.querySelector('.decrement');

        incrementButton.addEventListener('click', () => {
            const currentValue = parseInt(numberInput.value);
            const maxValue = parseInt(numberInput.max);

            if (currentValue < maxValue) {
                numberInput.value = currentValue + 1;
            }
        });

        decrementButton.addEventListener('click', () => {
            const currentValue = parseInt(numberInput.value);
            const minValue = parseInt(numberInput.min);

            if (currentValue > minValue) {
                numberInput.value = currentValue - 1;
            }
        });
    });
});
 </script>
</body>

</html>
