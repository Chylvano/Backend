<?php 
	$db = mysqli_connect('localhost', 'root', '', 'backend');

	$naam = "";
    $info = "";
 
	if (isset($_POST['save'])) {
		$naam = $_POST['naam'];
        $info = $_POST['info'];

      
		

		mysqli_query($db, "INSERT INTO lijst (naam, info)
		VALUES ('$naam', '$info')"); 
		header('location: index.php');
    }
?>
