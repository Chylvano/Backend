<?php
require ("assets/includes/functions.php");
require ("assets/includes/navbar.php");
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
            <label for="datum">Datum:</label>
            <input type="date" class="datum" id="datum" name="datum" required>
        </p>
        <input type="hidden" id="lijst_id" name="lijst_id" value="<?=$_GET['id']?>">
        <input type="hidden" id="voltooing" name="voltooing" value="onvoltooid">
        <input type="submit" class="btn btn-primary" name="save">
    </form>
</body>
</html>
