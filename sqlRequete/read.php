<?php

    $dbhost = "localhost";
    $dbname = "pooCharacters";
    $dbusername = "root";
    $dbpassword = "0000";

    $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);

    
    $requete = $link->query("SELECT * FROM Characters JOIN Job ON Characters.job_id = Job.idJob JOIN Weapon ON Characters.weapon_id = Weapon.idWeapon");
    $requete->execute();
    $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
    
    