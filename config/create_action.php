<?php
session_start();
require_once "connect.php";

$name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
$type = filter_input(INPUT_POST,"type",FILTER_SANITIZE_SPECIAL_CHARS);
$region = filter_input(INPUT_POST,"region",FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST,"description",FILTER_SANITIZE_SPECIAL_CHARS);

if($name && $type && $region && $description){
    $sql = $conn->prepare("INSERT INTO pokemons (name,type,region,description) VALUES (:name,:type,:region,:description)");

    $sql->bindValue(":name",ucfirst($name));
    $sql->bindValue(":type",ucfirst($type));
    $sql->bindValue(":region",ucfirst($region));
    $sql->bindValue(":description",ucfirst($description));

    $sql->execute();

    header("Location: ../index.php");

} else{
    $_SESSION["alert"] = "Insira as informaçõs abaixo";
    header("Location: ../create.php");
    exit;
}