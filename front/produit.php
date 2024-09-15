
<?php require_once '../include/database.php';
  
   $sqlstate =  $pdo->prepare('SELECT * FROM produit  WHERE  id=?');
   $id = $_GET['id'];
  $sqlstate->execute([$id]);
   $produit =   $sqlstate->fetch();
 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" >
    <title> produit | <?php echo  $produit ['libelle']  ?></title>
</head>
<body>
    
<?php include '../include/navfront.php' ;


$idProduit = $produit['id'];


$idUser =  $_SESSION ['user']['id'];
$qty = isset($_SESSION['panier'][$idUser][$idProduit]) ? $_SESSION['panier'][$idUser][$idProduit] : 0;
$button  =  $qty ==  0 ? 'Ajouter' : ' Modifier';?>
<div class="container py-2"> 
  <div class="container"> 
    <div class="row">
      <div class="col-md-6">
        <img class="img img-fluid w-75" src="../upload/produit/<?php echo $produit['image']; ?>" alt="<?php echo $produit['libelle']; ?>">
      </div>
      <div class="col-md-6">
        <h1><?php echo $produit['libelle']; ?></h1>

        <?php 
        
        $prix = $produit['prix']; 

        $discount = $produit ['discount'];

        $totale = $prix - (( $discount  * $prix)/100)
        
        ?>
   

        <?php  if(!empty($produit['discount']))  {?>  

            <h3> <span class="badge text-bg-secondary"><strike><?php echo $produit['prix']; ?>.00$</strike></span> <span class="badge text-bg-success"><?php  echo $totale?>.00$</span></h3> 

            
          <p>   Discount :  <span class="badge text-bg-success"><?php echo $produit['discount'] ?>%</span></p>
        
        <?php 
    } else { ?> <h3> <span class="badge text-bg-secondary"><?php echo $produit['prix']; ?>.00$</span>  </h3> <?php } ?>
        <p> <?php echo $produit['description']; ?></p>


        <div class="card-footer" style="z-index: 10;">
  <div class="counter d-flex">
  <form method = "post"  action = "ajouter_panier.php">
  <?php include '../include/front/counter.php'; ?>
  </div> 
  </div>


        
  <input type="submit" class=" btn btn-primary mx-1"  value =  <?php echo   $button ?> name =  "ajouter">

  </form>

       
        
        
          </p>
      </div>
    </div>
  </div>
</div>
<script >document.addEventListener('DOMContentLoaded', (event) => {
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
});</script> 
</body>
</html>
