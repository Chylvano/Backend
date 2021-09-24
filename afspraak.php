<?php
    require ("assets/includes/functions.php");
    require ("assets/includes/navbar.php");
    $id = $_GET['id'];
    $result = getOneAfspraak($id);
    $results = getAllTakenInLijst($id);
    $rows = countAllAfspraken();
?>


<body>
<div class="container">
<div class="mb-5 mt-2">

    <div class="d-lg-flex flex-lg-row flex-sm-column justify-content-between">
        <h1><?=$result['naam']?></h1>
        <div class="align-self-center">
            <a class="btn-lg btn-info text-white" href="afspraakplannen.php?id=<?=$result['id']?>">Kaart toevoegen</a>
            <a class="btn-lg btn-danger text-white" href="delete.php?id=<?=$result['id']?>">Verwijderen</a>
        </div>
    </div>
    <div class="content mt-2">
        <div class="row">
            <div class="col-sm-12 col-lg-3">
        </div>
        </div>
    </div>
    <hr>
</div>
<h2>Upcoming events:</h2>
<div class="row mt-2">
        <?php
        foreach ($results as $row) {
            ?>
        <div class="card col-4">
                <div class="card-body">
                    <h4 class="card-title"><?=$row['naam']?></h4>
                    <p class="card-text">
                        <p>Tijd:</p>
                    </p>
                    <a href="afspraak.php?id=<?=$row['id']?>" class="btn btn-primary">More details</a>
            </div>
            </div>
        <?php
            }
        ?>
    </div>
</div>

</body>
</html>