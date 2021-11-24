<?php 
require ("assets/includes/functions.php");
require ("assets/includes/navbar.php");
$conn = connect();
$result = getAllAfspraken();

?>

<body>
<div class="container">
<div>
        <label for="naam">Sorteren op:</label><br>
       <form class="form" method="post">
            <input class="buttons" type="submit" name="datum" value="Sorteer op datum">
       </form>
       <form class="form" method="post">
            <input class="buttons" type="submit" name="status" value="Sorteer op status">
       </form>
        </div>
        <?php
        foreach ($result as $row) {
            ?>
        <div class="card">
                <div class="card-body m-4">
                    <h4 class="card-title mb-4"><?=$row['naam']?></h4>
                    <h4 class="card-title mb-4"><?=$row['datum']?></h4>
                    <a class="btn-danger btn-info text-white" href="deletelijst.php?id=<?=$row['id']?>">Delete lijst</a>
                    <a class="btn-succes btn-info text-white" href="afspraakplannen.php?id=<?=$row['id']?>">Kaart toevoegen</a>
                    <a class="btn-warning btn-info text-white" href="updateform.php?id=<?=$row['id']?>">Kaart Bewerken</a>
                    <?php
        $id = $row['id'];
        $taken = getAllTakenById($id);
      
        if(isset($_POST['datum'])){
            $taken = getAllTakenByIdOrderByDate($id);
        }else if(isset($_POST['voltooing'])){
                $taken = getAllTakenByIdOrderByStatus($id);
            }else{
                // $taken = getAllTaken($id);
            }
        ?>
      
      <?php   foreach ($taken as $taak) { ?>
             <div class="card">
                <div class="card-body">
                <a class="btn-danger btn-info text-white" href="delete.php?id=<?=$taak['id']?>">Delete Task</a>
                <a class="btn-warning btn-info text-white" href="updatetaak.php?id=<?=$taak['id']?>">Taak Bewerken</a>
            <h4 class="card-title"><?=$taak['naam']?></h4>
            <p class="card-text"><?=$taak['info']?></p>
            <p class="card-text"><?=$taak['datum']?></p>
          
            <?php if ($taak['voltooing'] == 'voltooid'){?>
                <a class="btn btn-success" href="editstatus.php?id=<?= $taak['id']?>voltooing=<?= $taak['voltooing']?>"></a>
           
            <?php } else { ?>
                <a class="btn btn-danger" href="editstatus.php?id=<?= $taak['id']?>voltooing=<?= $taak['voltooing']?>"></a>
                </div>
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
</body>
</html>