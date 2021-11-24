<?php 
require ("assets/includes/functions.php");
	$db = mysqli_connect('localhost', 'root', '', 'backend');

	$naam = "";
    $info = "";
	$datum = "";
 
	if (isset($_POST['save'])) {
		$naam = $_POST['naam'];
        $info = $_POST['info'];
		$datum = $_POST['datum'];
		
		
      
		

	 insertLijst($naam, $info, $datum);
		header('location: index.php');
    }
?>
