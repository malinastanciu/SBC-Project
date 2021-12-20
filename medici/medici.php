<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../medici/medici.css">
        <link rel="stylesheet" href="../static/bootstrap.min.css">

    </head>
    <title>Medici</title>
    <body>
        <form action="../dashboard/dashboard.php" method="GET">
            <button type="submit" id="btn1" class="btn btn-danger btn-xs">Inapoi</button>
         </form>
        <h1>Evidenta medici</h1>

        <div id="cautare_medic" class="container">
            <p id="cautare">Cautare medic</p>
            <p>Introdu numele medicului cautat!</p>
            <form action="" method="post">
                <input type="text" name="medic" id="medic" placeholder="Nume medic">
                <input type="submit" class="btn btn-success btn-md" name="search" placeholder="Search">
            </form>
            <?php
                $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                    {
                        $den_medic = $_POST['medic'];
                        foreach ($xml->lista_medici->medic as $medic) {
                            if(strcmp($medic->nume, $den_medic)==0){
                                echo "<b>Informatii medic</b><br>";
                                echo "<b>Nume:</b>$medic->nume<br>";
                                echo "<b>Varsta:</b>$medic->varsta<br>";
                                echo "<b>Specializarea:</b>$medic->specializarea<br>";
                                echo "<b>Animal in evidenta:</b>";
                                foreach ($medic->lista_evidenta->animal as $animal){
                                    echo " $animal->nume";
                            }
                            }
                        }
                    }
            ?>
        </div>


    </body>
</html>

