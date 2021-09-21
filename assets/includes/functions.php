<?php

function connect()
{
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "backend";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
    return $conn;
}

catch(PDOException $e)
    {
    echo "connection failed: " . $e->getMessage();
    }
}


function getAllAfspraken(){
    $conn = connect();
    $stmt = $conn->prepare('SELECT * FROM lijst ORDER BY NAAM');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function countAllAfspraken(){
    $conn = connect();
    $pdoQuery = "select id from lijst";
    $pdoResult = $conn->query($pdoQuery);
    $rows = $pdoResult->rowCount();
    return $rows;
}

function getOneAfspraak(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM lijst where id=:id");
    $stmt->execute(['id' => $_GET['id']]);
    $result = $stmt->fetch();
    return $result;
}


?>

