<?php
require_once "connect.php";
session_start();

$id = filter_input(INPUT_POST,"id",FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
$type = filter_input(INPUT_POST,"type",FILTER_SANITIZE_SPECIAL_CHARS);
$region = filter_input(INPUT_POST,"region",FILTER_SANITIZE_SPECIAL_CHARS);
$description = filter_input(INPUT_POST,"description",FILTER_SANITIZE_SPECIAL_CHARS);

if($name && $type && $region && $description){
    $sql = $conn->prepare("UPDATE pokemons SET name=:name, type=:type, region=:region, description=:description WHERE id = :id");

    $sql->bindValue(":name",$name);
    $sql->bindValue(":type",$type);
    $sql->bindValue(":region",$region);
    $sql->bindValue(":description",$description);
    $sql->bindValue(":id",$id);

    $sql->execute();

    $_SESSION["sucess"] = "Item editado com sucesso!";
    header("Location: ../index.php");
    exit;

} else{
    $_SESSION["alert"] = "Não foi possível editar";
    header("Location: ../edit.php");
    exit;
}