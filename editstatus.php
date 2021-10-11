<?php
require ("assets/includes/functions.php");
$conn = connect();
$id = $_GET['id'];

$status = $_GET['status'];

if($status == 'voltooid'){
    $status = 'onvoltooid';
} else{
    $status = 'voltooid';
}

editTaak($id, $status);

header('location: index.php');
