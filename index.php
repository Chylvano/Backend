<?php 
require ("assets/includes/functions.php");
require ("assets/includes/navbar.php");
$result = getAllAfspraken();
$rows = countAllAfspraken();
?>

<!DOCTYPE html>
<html lang="en">
<body>
<div class="container">
    <div class="row mt-2">
        <?php
        foreach ($result as $row) {
            ?>
        <div class="card col-2">
                <div class="card-body">
                    <h4 class="card-title"><?=$row['naam']?></h4>
                    <p class="card-text">
                        <p>Tijd: <?=$row['tijd']?></p>
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