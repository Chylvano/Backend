<?php
$id = $_GET['id'];
require ("assets/includes/functions.php");
deleteTaak($id);
header('location: index.php');
?>
