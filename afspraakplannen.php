<?php
require ("assets/includes/functions.php");
require ("assets/includes/navbar.php");
$result = getOneAfspraak();
?>

<body class="text-center">
    <form action="insert.php" method="post">
        <p class="my-4 form-group">
            <label for="naam">Naam:</label>
            <input name="naam" id="naam" placeholder="Naam" required>
        </p>
        <p class="my-4 form-group">
            <label for="info">Info:</label>
            <input name="info" id="info" placeholder="Info" required>
        </p>
        <p class="my-4 form-group">
            <label for="tijd">Datum:</label>
            <input id="date" name="date" type="number" placeholder="<?=Date('j-n-Y')?>" />
        </p>
        <p class="my-4 form-group">
            <label for="tijd">Tijd:</label>
            <input type="time" name="tijd" id="tijd" required>
        </p>
        <input type="hidden" id="lijst_id" name="lijst_id" value="<?=$result['id']?>">
        <input type="submit" class="btn btn-primary" name="save">
    </form>
</body>
</html>
