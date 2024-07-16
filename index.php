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
<?php include 'include/nav.php' ?>

<div class="container py-2"> 
<?php  
    if (isset($_POST['ajouter'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (!empty($login) && !empty($password)) {
            require_once 'include/database.php';

            // Check if the login already exists
            $sql = $pdo->prepare('SELECT COUNT(*) FROM user WHERE login = ?');
            $sql->execute([$login]);
            $emailExists = $sql->fetchColumn();

            if ($emailExists) {
                // Login already exists
                ?>
                <div class="alert alert-danger" role="alert">
                    User already exists <a href="http://localhost:8080/pratique/connexion">connect in your compte</a>.
                </div>
                <?php
            } else {
                $date = date('Y-m-d'); 

                // Insert the new user into the database
                $sql = $pdo->prepare('INSERT INTO user VALUES (null, ?, ?, ?)');
                $sql->execute([$login, $password, $date]);
                ?>
                <div class="alert alert-success" role="alert">
                    Your account is registered.
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Login and password are required.
            </div>
            <?php
        }
    } 
   ?> 

    <form method="post">

   
        <label class="form-label">Login</label>
        <input type="text" class="form-control" name="login">

        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
        
        <input type="submit" value="Ajouter utilisateur" class="btn btn-primary my-2" name="ajouter">

    </form>
</div>

</body>
</html>
