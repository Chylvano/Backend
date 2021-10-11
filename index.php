<?php 
require ("assets/includes/functions.php");
require ("assets/includes/navbar.php");
$result = getAllAfspraken();
$rows = countAllAfspraken();
$datum = 'a';
$status = 'a';
if($datum == 'datum'){

}
?>

<body>
<div class="container">
<div>
        <label for="naam">Sorteren op:</label><br>
        <select class="form-control">
            <option value="" disabled selected hidden>--Selecteer een optie--</option>
                <option class="datum" value="datum">Datum</option>
                <option class="status" value="status">Status</option>
        </select>
        </div>
    <div class="card-group">
        <?php
        foreach ($result as $row) {
            ?>
        <div class="card">
                <div class="card-body m-4">
                    <h4 class="card-title mb-4"><?=$row['naam']?></h4>
                    <a class="btn-lg btn-info text-white" href="deletelijst.php?id=<?=$row['id']?>">Delete lijst</a>
                    <a class="btn-lg btn-info text-white" href="afspraakplannen.php?id=<?=$row['id']?>">Kaart toevoegen</a>
                    <?php
        $id = $row['id'];
        $taken = getAllTakenById($id);
        ?>

        <?php foreach ($taken as $taak) { ?>
             <div class="card">
                <div class="card-body">
                <a class="btn-lg btn-info text-white" href="delete.php?id=<?=$taak['id']?>">Delete Task</a>
            <h4 class="card-title"><?=$taak['naam']?></h4>
            <p class="card-text"><?=$taak['info']?></p>
          
            <?php if ($taak['status'] == 'voltooid'){?>
                <a class="btn btn-success" href="editstatus.php?id=<?php echo $taak['id']?>&status=<?php echo $taak['status']?>"></a>
           
            <?php } else { ?>
                <a class="btn btn-danger" href="editstatus.php?id=<?php echo $taak['id']?>status=<?php echo $taak['status']?>"></a>

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