<?php
  include('./header.php'); 
  spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
  });
   
    $dbhost = "localhost";
    $dbname = "pooCharacters";
    $dbusername = "root";
    $dbpassword = "0000";

    $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);

    
    $requete = $link->query("SELECT * FROM Monster");
    $requete->execute();
    $donnees = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<div>
  <h3>Contre qui voulez-vous faire combattre ce héro ? </h3>
  <?php foreach ($donnees as $key => $value): ?>
  <?php $monster = new Monster($value["nameMonster"], $value["health"], $value["damage"]); ?>
    <div class="card mb-4 perso-style">
      <h3 class="card-title"> <?= $monster->getName() ?> </h3>
      <div class="card-body">
        <p class="card-text"> <?= $monster->getHealth() ?></p>
        <p class="card-text"> <?= $monster->getDamage() ?></p>

      <form method="post" action="sqlRequete/fight.php?idMonster=<?= $value['idMonster'] ?>&idChara=<?= $_GET['idChara'] ?>">
        <button type="submit" name="fight">Combattre le monstre</button>
      </form>
    </div>
  <?php endforeach ?>  
</div>

<?php include('./footer.php') ?>