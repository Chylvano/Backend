<?php
require ("assets/includes/functions.php");
$conn = connect();
$id = $_GET['id'];
$voltooing = $_GET['voltooing'];

if($voltooing == 'voltooid'){
    $voltooing = 'onvoltooid';
} else{
    $voltooing = 'voltooid';
}

editTaak($id, $voltooing);

header('location: index.php');
