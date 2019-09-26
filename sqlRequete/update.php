<?php
session_start();
$name = $_POST['name'];

$id = $_GET['idChara'];


    $dbhost = "localhost";
    $dbname = "pooCharacters";
    $dbusername = "root";
    $dbpassword = "0000";

    $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
    $requeteUpdate = "UPDATE Characters SET nameChara = '$name' WHERE idChara = '$id'";
    $requete_preparee = $link->query($requeteUpdate);
    $requete_preparee->execute();
    header('Location: ../index.php');

?>