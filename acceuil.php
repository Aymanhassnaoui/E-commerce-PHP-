

<?php include 'include/titre.php'



?>

<?php include 'include/nav.php' ?>
<?php  
 require_once 'include/database.php';

 $querySql = $pdo->query('SELECT * FROM user' )->fetchAll(PDO::FETCH_ASSOC);

  $totaleuser = count($querySql );
 

  $querySqlHomme = $pdo->query('SELECT * FROM user   WHERE genre = "homme"' )->fetchAll(PDO::FETCH_ASSOC);
 $totaleHomme =   count($querySqlHomme );

 
 $querySFemme = $pdo->query('SELECT * FROM user   WHERE genre = "femme"' )->fetchAll(PDO::FETCH_ASSOC);

 $totaleFemme =  count($querySFemme );


 $pourcentageHommes = ($totaleHomme / $totaleuser) * 100;
$pourcentageFemmes = ($totaleFemme / $totaleuser) * 100;

   

    
   ?>

<div  style = " width: 25%" class ="    justify-content-around  mt-5  ms-5   "> 

<h3>les genre des user enregestrer  :</h3>

<span> Homme :</span>
<div   class="  progress  mb-3">
  <div class="progress-bar" role="progressbar" style="width: <?php  echo $pourcentageHommes ;  ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $pourcentageHommes ?>%</div>
</div>
<span> Femme :</span>
<div    class="  progress  mb-3">
<div class="progress-bar" role="progressbar" style="width: <?php echo $pourcentageFemmes; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $pourcentageFemmes ?>%</div>
</div>




 <?php  ?> 

</div>



