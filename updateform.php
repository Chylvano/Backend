<?php
require ("assets/includes/functions.php");
require ("assets/includes/navbar.php");
$id = $_GET['id'];
$row = getOneAfspraak();
?>

<body class="text-center">
    <div class="container">
      <form action="update.php" method="post">
      <input type="hidden" name="id" id="id" value="<?= $row["id"] ?>">
        <p class="my-4">
            <label for="naam">Naam:</label>
            <input type="text" name="naam" id="naam" value="<?= $row["naam"] ?>" required>
        </p>
        <p class="my-4">
            <label for="info">Info:</label>
            <input type="text" name="info" id="info" value="<?= $row["info"] ?>" required>
        </p>
        <p class="my-4">
            <label for="info">Datum:</label>
            <input type="date" name="datum" id="datum" value="<?= $row["datum"] ?>" required>
        </p>
        <button type="submit" class="btn btn-primary">submit</button>
    </form>
</body>
</html>