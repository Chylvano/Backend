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

function getAllTakenByDate(){
    $conn = connect();
    $stmt = $conn->prepare('SELECT * FROM taken ORDER BY datum, tijd');
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

function getAllTakenById($id){   
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM taken WHERE lijst_id = :id"); 
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll();
}

function editTaak($id, $status){
    $conn = connect(); 
    $stnt = $conn->prepare("UPDATE taken SET id = :id,  status = :status WHERE id = :id");
    $stnt->bindParam(':id', $id);
    $stnt->bindParam(':status', $status);
    $stnt->execute();
}

function deleteTaak($id){
    $conn = connect();
    $stmt = $conn->prepare("DELETE FROM taken WHERE id= :deleteid");
    $stmt->execute([":deleteid" =>$id]);
}

function deleteLijst($id){
    $conn = connect();
    $stmt = $conn->prepare("DELETE FROM lijst WHERE id= :deleteid");
    $stmt->execute([":deleteid" =>$id]);
}

function deleteTaakByLijstId($id){
    $conn = connect();
    $stmt = $conn->prepare("DELETE FROM taken WHERE lijst_id= :deleteid");
    $stmt->execute([":deleteid" =>$id]);
}

?>

