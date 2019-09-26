<?php

require_once('./sqlRequete/read.php');

include('./header.php');

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});


?>

<div class="container">
    <h1 class="my-4 title">Personnage</h1>
  <div class="row">
    <div class="element-perso">
    <?php foreach ($donnees as $key => $value): ?>
    <?php $personnage = new Character($value["nameChara"], $value["health"], $value["mana"], $value["nameWeapon"], $value["damageWeapon"],$value["lvl"], $value["nameJob"], $value["damage"]); ?>
        <div class="card mb-4 perso-style">
          <h3 class="card-title"> <?= $personnage->getName() ?> </h3>
          <div class="card-body">
            <p class="card-text"> <?= $personnage->getHealth() ?> </p>
            <p class="card-text"> <?= $personnage->getMana() ?> </p>
            <p class="card-text"> <?= $personnage->getWeapon() ?> </p>
            <p class="card-text"> <?= $personnage->getlvl() ?> </p>
            <p class="card-text"> <?= $personnage->getJob() ?> </p>
            <a href="./modifier.php?idChara=<?= $value['idChara'] ?>" class="btn btn-primary">Modifier</a>
            <a href="./combat.php?idChara=<?= $value['idChara'] ?>" class="btn btn-success">Combattre</a>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
  <div>
    <a href="./creation.php">Recruter un héro !<a>
  </div>
  
</div>

<?php include('./footer.php') ?>
