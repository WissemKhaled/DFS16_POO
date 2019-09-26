<?php require_once("./sqlRequete/read.php");
    
    include('./header.php'); 
    $id = $_GET['idChara'];
    $dbhost = "localhost";
    $dbname = "pooCharacters";
    $dbusername = "root";
    $dbpassword = "0000";

    $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);

    $requete = $link->query("SELECT * FROM Characters WHERE idChara='$id'");
    $requete->execute();
    $uniquePerso = $requete->fetch(PDO::FETCH_ASSOC);
?>
<h3>Attention, vous ne pouvez changer que le nom du personnage ! Le reste des caractéristiques est prédéfini </h3>
                    
<div class="form">
    <!-- Page Content -->
    <div class="container ajouter_style">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="addCss">
                <form action="sqlRequete/update.php?idChara=<?= $uniquePerso['idChara'] ?>" method="POST" enctype="multipart/form-data"
                class="style-form">
                    <label>Nom du personnage : </label>
                    <input type="text" name="name" id="name" value="<?= $uniquePerso['nameChara'] ?>" required>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('./footer.php') ?>