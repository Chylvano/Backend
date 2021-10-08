<?php 
	$db = mysqli_connect('localhost', 'root', '', 'backend');

    $lijst_id = "";
	$naam = "";
    $info = "";
    $datum = "";
 
	if (isset($_POST['save'])) {
        $lijst_id = $_POST['lijst_id'];
		$naam = $_POST['naam'];
        $info = $_POST['info'];
        $datum = $_POST['datum'];
      
		

		mysqli_query($db, "INSERT INTO taken (lijst_id, naam, info, datum)
		VALUES ('$lijst_id', '$naam', '$info', '$datum' )"); 
		header('location: index.php');
    }
?>
