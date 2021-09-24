<?php 
	$db = mysqli_connect('localhost', 'root', '', 'backend');

	$naam = "";
    $info = "";
    $tijd = "";
    $datum = "";
    $lijst_id = "";

	if (isset($_POST['save'])) {
		$naam = $_POST['naam'];
        $info = $_POST['info'];
        $tijd = $_POST['tijd'];
        $datum = $_POST['datum'];
        $lijst_id = $_POST['lijst_id'];
		

		mysqli_query($db, "INSERT INTO taken (naam, info, tijd, datum, lijst_id)
		VALUES ('$naam', '$info', '$tijd', '$datum', 'lijst_id')"); 
		header('location: index.php');
    }
?>
