<?php 
require ("assets/includes/functions.php");
require ("assets/includes/navbar.php");
$result = getAllAfspraken();
$rows = countAllAfspraken();
$conn = connect();
?>


<style>
    .green{
        color: green;
    }
</style>
<body>
<div class="container">
<div>
        <label for="naam">Sorteren op:</label><br>
        <select class="form-control <?=$class["naam"] ?>" name="naam">
            <option value="" disabled selected hidden>--Selecteer een optie--</option>
                <option value=""></option>
        </select>
        </div>
    <div class="card-group">
        <?php
        foreach ($result as $row) {
            ?>
        <div class="card">
                <div class="card-body m-4">
                    <h4 class="card-title mb-4"><?=$row['naam']?></h4>
                    <a class="btn-lg btn-info text-white" href="afspraakplannen.php?id=<?=$row['id']?>">Kaart toevoegen</a>
                    <?php
        $id = $row['id'];
        $taken = getAllTakenById($id);
        ?>

        <?php foreach ($taken as $taak) { ?>
             <div class="card">
                <div class="card-body">
            <h4 class="card-title"><?=$taak['naam']?></h4>
            <p class="card-text"><?=$taak['info']?></p>
            <?php if ($taak['status'] == 'voltooid'){?>

                <!-- <a class="taskicons green fas fa-square"></a> -->
                <a type="button" class="btn btn-primary" href="editstatus.php?id=<?php echo $taak['id']?>&lijst_id=<?php echo $taak['lijst_id']?>&naam=<?php echo $taak['naam']?>&info=<?php echo $taak['info']?>&datum=<?php echo $taak['datum']?>&status=<?php echo $taak['status']?>">Primary</a>
            <?php } else { ?>
                <!-- <a class="taskicons red fas fa-square"></a> -->
                <a type="button" class="btn btn-warning" href="editstatus.php?id=<?php echo $taak['id']?>&lijst_id=<?php echo $taak['lijst_id']?>&naam=<?php echo $taak['naam']?>&info=<?php echo $taak['info']?>&datum=<?php echo $taak['datum']?>&status=<?php echo $taak['status']?>">Warning</a>

          <?php  
          }
            ?>
        </div>
        <?php
        }
        ?>
            </div>
            </div>
        <?php
            }
        ?>
    </div>
</div>
</body>
</html>