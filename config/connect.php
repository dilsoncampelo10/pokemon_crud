<?php

$host = "localhost";
$dbname = "pokemon";
$user = "root";
$pass = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname;",$user,$pass);
} catch (PDOException $e){
    echo "Não foi possível se conectar";
}