<?php
require ("assets/includes/functions.php");

$id = $_POST['id'];
$naam = $_POST['naam'];
$info = $_POST['info'];
$datum = $_POST['datum'];
updatelijst($id, $naam, $info, $datum);
header('location: index.php');
    ?>