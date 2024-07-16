<?php

try {
    $pdo = new PDO('mysql:host=localhost;port=3307;dbname=pratique', 'root', '');
    // Configure PDO pour afficher les erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch (PDOException $e) {
    echo 'Échec de la connexion : ' . $e->getMessage();
}

