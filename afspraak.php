<?php
    require ("assets/includes/functions.php");
    require ("assets/includes/navbar.php");
    $id = $_GET['id'];
    $result = getOneAfspraak($id);
?>

<!doctype html>
<html lang="en">
<body>
<div class="container">
<div class="mb-5 mt-2">

    <div class="d-lg-flex flex-lg-row flex-sm-column justify-content-between">
        <h1><?=$result['naam']?></h1>
        <div class="align-self-center">
            <a class="btn-lg btn-info text-white" href="update.php">Veranderen</a>
            <a class="btn-lg btn-danger text-white" href="delete.php?id=<?=$result['id']?>">Verwijderen</a>
        </div>
    </div>
    <div class="content mt-2">
        <div class="row">
            <div class="col-sm-12 col-lg-3">

        
            <p class="card-text">
                 <?=$result['info']?>
            </p>
        </div>
        </div>
    </div>
    <hr>
</div>
</div>

</body>
</html>