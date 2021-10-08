<?php
require ("assets/includes/functions.php");
$conn = connect();
$id = $_GET['id'];
$lijst_id = $_GET['lijst_id'];
$naam = $_GET['naam'];
$info = $_GET['info'];
$datum = $_GET['datum'];
$status = $_GET['status'];

if($status == 'voltooid'){
    $status = 'onvoltooid';
} else{
    $status = 'voltooid';
}

editTaak($id, $lijst_id, $naam, $info, $datum, $status);

header('location: index.php');
