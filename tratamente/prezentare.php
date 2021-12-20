<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../tratamente/prezentare.css">
        <link rel="stylesheet" href="../static/bootstrap.min.css">

    </head>
    <title>Medici</title>
    <body>
        <form action="../dashboard/dashboard.php" method="GET">
            <button type="submit" id="btn1" class="btn btn-danger btn-xs">Inapoi</button>
         </form>
        <h1>Evidenta tratamentelor din cabinetul veterinar</h1><br>

        <div id="cautare_medic" class="container">
            <button class="btn btn-danger"><a href="../tratamente/tratamente.php">Informatii generale tratamente</a></button>
        </div>
        <div id="cautare_medic" class="container">
            <button class="btn btn-danger"><a href="../tratamente/tratamente_intre_doua_sume.php">Tratamente intre doua intervale de preturi</a></button>
        </div>
        <div id="cautare_medic" class="container">
            <button class="btn btn-danger"><a href="../tratamente/tratamente_peste_o_suma.php">Tratamente peste o anumita suma</a></button>
        </div>
        <div id="cautare_medic" class="container">
            <button class="btn btn-danger"><a href="../tratamente/tratamentul_cel_mai_scump.php">Tratamentul cel mai scump</a></button>
        </div>
    </body>
</html>

