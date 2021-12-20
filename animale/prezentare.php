<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../animale/prezentare.css">
        <link rel="stylesheet" href="../static/bootstrap.min.css">

    </head>
    <title>Medici</title>
    <body>
        <form action="../dashboard/dashboard.php" method="GET">
            <button type="submit" id="btn1" class="btn btn-danger btn-xs">Inapoi</button>
         </form>
        <h1>Evidenta animalelor din cabinetul veterinar</h1><br>

        <div id="cautare_medic" class="container">
            <button class="btn btn-danger"><a href="../animale/animale.php">Informatii generale animale</a></button>
        </div>
        <div id="cautare_medic" class="container">
            <button class="btn btn-danger"><a href="../animale/animale_fara_stapan.php">Animale fara stapan</a></button>
        </div>
        <div id="cautare_medic" class="container">
            <button class="btn btn-danger"><a href="../animale/animal_abandonat.php">Animale abandonate</a></button>
        </div>
    </body>
</html>

