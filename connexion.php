<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Page connexion</title>
</head>
<body>
<?php include 'include/nav.php' ?>

<div class="container py-2"> 
<h3>
  CONNECT TO YOUR COMPTE
  <small class="text-body-secondary">WITH YOUR LOGIN AND PASSWORD :</small>
</h3>
<?php  
    if (isset($_POST['connexion'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (!empty($login) && !empty($password)) {
            require_once 'include/database.php';

            $sql = $pdo->prepare('SELECT * FROM user WHERE login = ?  AND password = ?');
            $sql->execute([$login, $password]);
             if ($sql->rowCount() >= 1) {
            
               $_SESSION['user'] = $sql->fetch();
               header('location:admin.php');
            
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                A username or password is incorrect.
                </div>
                <?php
            }}else {
                ?>
                <div class="alert alert-danger" role="alert">
                Login and password are required.
                </div>
                <?php

            }}
    
   ?> 

    <form method="post">
        <label class="form-label">Login</label>
        <input type="text" class="form-control" name="login">

        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
        
        <input type="submit" value="connexion" class="btn btn-primary my-2" name="connexion">
        
    </form>
</div>

</body>
</html>
