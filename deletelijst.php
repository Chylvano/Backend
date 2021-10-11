<?php
$id = $_GET['id'];
require ("assets/includes/functions.php");
deleteLijst($id);
deleteTaakByLijstId($id);
header('location: index.php');
?>
