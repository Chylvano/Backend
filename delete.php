<?php
$id = $_GET['id'];
require ("assets/includes/functions.php");
deleteAfspraak($id);
header('location: index.php');
?>
