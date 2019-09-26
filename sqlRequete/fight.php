<?php

    include('../header.php'); 
        spl_autoload_register(function ($class) {
        include '../classes/' . $class . '.php';
    });

    $idMonster = str_replace("'","",$_GET['idMonster']);
    $idChara = str_replace("'","",$_GET['idChara']);
    
    $dbhost = "localhost";
    $dbname = "pooCharacters";
    $dbusername = "root";
    $dbpassword = "0000";

    $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
    $requeteChara = $link->prepare("SELECT * FROM Characters JOIN Weapon ON Characters.weapon_id = Weapon.idWeapon JOIN Job ON Characters.job_id = Job.idJob WHERE idChara = $idChara ");
    $requeteMonster = $link->prepare("SELECT * FROM Monster WHERE idMonster = $idMonster ");
    
   
    $requeteChara->execute();
    $requeteMonster->execute();
    $donneesChara = $requeteChara->fetch(PDO::FETCH_ASSOC);
    $donneesMonster = $requeteMonster->fetch(PDO::FETCH_ASSOC);
    
    $firstCharacter = new Character($donneesChara["nameChara"], $donneesChara["health"], $donneesChara["mana"], $donneesChara["nameWeapon"], $donneesChara["damageWeapon"], $donneesChara["lvl"], $donneesChara["nameJob"], $donneesChara["damage"]);
    $evilVilain = new Monster($donneesMonster["nameMonster"], $donneesMonster["health"], $donneesMonster["damage"]);


    while ($firstCharacter->getHealth() > 0 && $evilVilain->getHealth() > 0 ) 
    {
        if($firstCharacter->getHealth() > 0)
        {  
            $firstCharacter->combat($evilVilain);
            echo "Le " .$firstCharacter->getJob(). " attaque le " .$evilVilain->getName(). " avec " .$firstCharacter->getWeapon()." !<br>";
            if ($evilVilain->getHealth() <= 0)
            {
                echo " il reste 0 hp au " .$evilVilain->getName(). "<br>";
                echo "<br>Le " . $GLOBALS["evilVilain"]->getName(). " est mort !<br>";
                Monster::dead($donneesMonster['idMonster']);
                ?> 
                <form method="post" action="../index.php">
                    <button type="submit" name="fight">revenir au choix d'un personnage</button>
                </form>
                <?php


            } elseif ($evilVilain->getHealth() > 0) {
                echo " il reste " .$evilVilain->getHealth(). " hp au " .$evilVilain->getName(). "<br>";
            }
        }
        if($GLOBALS["evilVilain"]->getHealth() > 0)
        {
            $evilVilain->combat($firstCharacter);
            echo 'Le '. $evilVilain->getName() . ' attaque ' . $firstCharacter->getJob(). " !<br>";
            if ($firstCharacter->getHealth() <= 0)
            {
                echo " il reste 0 hp au " .$firstCharacter->getJob(). "<br>";
                echo "<br>Le " . $GLOBALS["firstCharacter"]->getJob()." ". $GLOBALS["firstCharacter"]->getName(). " est mort !<br>";
                Character::dead($donneesChara['idChara']);
                ?> 
                <form method="post" action="../index.php">
                    <button type="submit" name="fight">revenir au choix d'un personnage</button>
                </form>
                <?php
            } elseif ($firstCharacter->getHealth() > 0) {
                echo " il reste " .$firstCharacter->getHealth(). " au " .$firstCharacter->getJob(). "<br>";
            }
           
        }
    }

    include('../footer.php'); 