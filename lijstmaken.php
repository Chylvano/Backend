<?php
require ("assets/includes/navbar.php");
?>

<body class="text-center">
    <form action="insertlijst.php" method="post">
        <p class="my-4 form-group">
            <label for="naam">Naam:</label>
            <input name="naam" id="naam" placeholder="Naam" required>
        </p>
        <p class="my-4 form-group">
            <label for="info">Info:</label>
            <input name="info" id="info" placeholder="Info" required>
        </p>
        <input type="submit" class="btn btn-primary" name="save">
    </form>
</body>
</html>
