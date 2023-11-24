<?php

$usuario = 'root';
$senha = '123456';
$database = 'pet_house';
$host = 'localhost';

$mysqli = new mysqli($usuario, $senha, $database, $hosts);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

?>