<?php 
require ("assets/includes/functions.php");
	$db = mysqli_connect('localhost', 'root', '', 'backend');

    $lijst_id = "";
	$naam = "";
    $info = "";
    $datum = "";
    $voltooing = "";
 
	if (isset($_POST['save'])) {
        $lijst_id = $_POST['lijst_id'];
		$naam = $_POST['naam'];
        $info = $_POST['info'];
        $datum = $_POST['datum'];
        $voltooing = $_POST['voltooing'];
      
		

	insertTaak($lijst_id, $naam, $info, $datum, $voltooing);
		header('location: index.php');
    }
?>
