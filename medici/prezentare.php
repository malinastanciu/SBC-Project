<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../medici/prezentare.css">
        <link rel="stylesheet" href="../static/bootstrap.min.css">

    </head>
    <title>Medici</title>
    <body>
        <form action="../dashboard/dashboard.php" method="GET">
            <button type="submit" id="btn1" class="btn btn-danger btn-xs">Inapoi</button>
         </form>
        <h1>Evidenta medicilor din cabinetul veterinar</h1><br>

        <div id="cautare_medic" class="container">
            <button class="btn btn-danger"><a href="../medici/medici.php">Informatii generale medici</a></button>
        </div>
        <div id="cautare_medic" class="container">
            <button class="btn btn-danger"><a href="../medici/medic_specialist.php">Medic specialist</a></button>
        </div>
        <div id="cautare_medic" class="container">
            <button class="btn btn-danger"><a href="../medici/angajatul_eficient.php">Angajatul eficient</a></button>
        </div>
    </body>
</html>

