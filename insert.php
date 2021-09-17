<?php 
	$db = mysqli_connect('localhost', 'root', '', 'backend');

	$naam = "";
    $info = "";
    $tijd = "";

	if (isset($_POST['save'])) {
		$naam = $_POST['naam'];
        $info = $_POST['info'];
        $tijd = $_POST['tijd'];
		

		mysqli_query($db, "INSERT INTO lijst (naam, info, tijd)
		VALUES ('$naam', '$info', '$tijd')"); 
		header('location: index.php');
    }
?>
