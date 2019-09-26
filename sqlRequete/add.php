<?php 
    session_start();
    $name = $_POST['name'];
    $health = $_POST['health'];
    $mana = $_POST['mana'];
    $job = $_POST['job'];
    $weapon = $_POST['weapon'];

    
    $dbhost = "localhost";
    $dbname = "pooCharacters";
    $dbusername = "root";
    $dbpassword = "0000";

    $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
    $requete = "INSERT INTO Characters (nameChara, health, mana, lvl, damage, weapon_id, job_id) VALUES('$name', $health, $mana, 1, 10, $weapon, $job)";

    $requete_preparee = $link->prepare($requete);
    $requete_preparee->execute();
    header('Location: ../?accueil'); 
    
?> 