<?php

require_once "connect.php";
$id = filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);

if($id){
    $sql= $conn->prepare("DELETE FROM pokemons WHERE id = :id");
    $sql->bindValue(":id",$id);
    $sql->execute();
   
} 
header("Location: ../index.php");
exit;