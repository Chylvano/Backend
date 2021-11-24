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

function getAllTakenByIdOrderByDate($id){   
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM taken WHERE lijst_id = :id ORDER BY datum"); 
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll();
}

function getAllTakenByIdOrderByStatus($id){   
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM taken WHERE lijst_id = :id ORDER BY status"); 
    $stmt->execute(['id' => $id]);
    return $stmt->fetchAll();
}

function getAllAfspraken(){
    $conn = connect();
    $stmt = $conn->prepare('SELECT * FROM lijst');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

// function getAllTaken($id){   
//     $conn = connect();
//     $stmt = $conn->prepare("SELECT * FROM taken WHERE lijst_id = :id"); 
//     $stmt->execute(['id' => $id]);
//     return $stmt->fetchAll();
// }

function getAllTakenByDate(){
    $conn = connect();
    $stmt = $conn->prepare('SELECT * FROM taken ORDER BY datum');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}


function getOneAfspraak(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM lijst where id=:id");
    $stmt->execute(['id' => $_GET['id']]);
    $result = $stmt->fetch();
    return $result;
}

function getOneTaak(){
    $conn = connect();
    $stmt = $conn->prepare("SELECT * FROM taken where id=:id");
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

function editTaak($id, $voltooing){
    $conn = connect(); 
    $stmt = $conn->prepare("UPDATE taken SET id = :id,  voltooing = :voltooing WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':voltooing', $voltooing);
    $stmt->execute();
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

function updateLijst($id, $naam, $info, $datum){
    $conn = connect(); 
    $stmt = $conn->prepare("UPDATE lijst SET id = :id,  naam = :naam, info = :info, datum = :datum WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':info', $info);
    $stmt->bindParam(':datum', $datum);
    $stmt->execute();
}

function updateTaak($id, $naam, $info, $datum){
    $conn = connect(); 
    $stmt = $conn->prepare("UPDATE taken SET id = :id,  naam = :naam, info = :info, datum = :datum WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':info', $info);
    $stmt->bindParam(':datum', $datum);
    $stmt->execute();
}

function insertLijst($naam, $info, $datum){
    $conn = connect(); 
    $stmt = $conn->prepare("INSERT lijst SET naam = :naam, info = :info, datum = :datum");
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':info', $info);
    $stmt->bindParam(':datum', $datum);
    $stmt->execute();
}

function insertTaak($lijst_id, $naam, $info, $datum, $voltooing){
    $conn = connect(); 
    $stmt = $conn->prepare("INSERT taken SET lijst_id = :lijst_id, naam = :naam, info = :info, datum = :datum, voltooing = :voltooing");
    $stmt->bindParam(':lijst_id', $lijst_id);
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':info', $info);
    $stmt->bindParam(':datum', $datum);
    $stmt->bindParam(':voltooing', $voltooing);
    $stmt->execute();
}

?>