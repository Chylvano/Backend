<?php 
require ("assets/includes/functions.php");
require ("assets/includes/navbar.php");
$result = getAllAfspraken();
$rows = countAllAfspraken();
?>

<body>
<div class="container">
<div>
        <label for="naam">Sorteren op:</label><br>
        <select class="form-control <?=$class["naam"] ?>" name="naam">
            <option value="" disabled selected hidden>--Selecteer een optie--</option>
                <option value=""></option>
        </select>
        </div>
    <div class="row mt-2">
        <?php
        foreach ($result as $row) {
            ?>
        <div class="card col-3">
                <div class="card-body">
                    <h4 class="card-title"><?=$row['naam']?></h4>
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