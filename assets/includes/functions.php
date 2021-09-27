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
    $stmt = $conn->prepare('SELECT * FROM lijst');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getAllAfsprakenByName(){
    $conn = connect();
    $stmt = $conn->prepare('SELECT * FROM lijst ORDER BY date, tijd');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getAllTakenInLijst1(){
    $conn = connect();
    $stmt = $conn->prepare('SELECT * FROM taken ORDER BY datum, tijd');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getAllTakenInLijst(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM taken where lijst_id=:id");
    $stmt->execute(['id' => $_GET['id']]);
    $result = $stmt->fetchAll();
    return $result;
}

function getAllAfsprakenExceptCurrent(){
    $conn = connect();
    $stmt = $conn->prepare('SELECT * FROM lijst');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

//$stmt = $conn->prepare('SELECT * FROM lijst WHERE id != :id ORDER BY date, tijd');

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

function deleteAfspraak($deleteid){
    $conn = connect();
    $stmt = $conn->prepare("DELETE FROM lijst WHERE id = :id");
    $stmt->bindParam(":id", $deleteid);
    $stmt->execute();
}

function countAllTaken(){
    $conn = connect();
    $pdoQuery = "select id from taken";
    $pdoResult = $conn->query($pdoQuery);
    $rows = $pdoResult->rowCount();
    return $rows;
}
?>

