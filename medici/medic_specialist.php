<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../medici/medici.css">
        <link rel="stylesheet" href="../static/bootstrap.min.css">

    </head>
    <title>Medici</title>
    <body>
        <form action="../medici/prezentare.php" method="GET">
            <button type="submit" id="btn1" class="btn btn-danger btn-xs">Inapoi</button>
         </form>
        <h1>Medic specialist</h1>

        <div id="cautare_medic" class="container">
            <p id="cautare">Cautare medic specialist</p>
            <p>Introduceti numele medicului cautat!</p>
            <form action="" method="post">
                <input type="text" name="medic" id="medic" placeholder="Nume medic">
                <input type="submit" class="btn btn-success btn-md" name="search" placeholder="Search">
            </form>
            <?php
                $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                    { $sir='';
                      (int)$ok = 0;
                        $den_medic = $_POST['medic'];
                        foreach ($xml->lista_medici->medic as $medic) {
                            if(strcmp($medic->nume, $den_medic)==0){
                               if(strcmp($medic->lista_evidenta->animal->nume,$sir)!=0){
                                    foreach ($medic->lista_activitati->activitate as $activitate){
                                        if(strcmp($activitate->nume, "castreaza") == 0){
                                            $ok += 1;
                                        }
                                        if(strcmp($activitate->nume, "opereaza") == 0){
                                            $ok += 1;
                                        }
                                        if(strcmp($activitate->nume, "vaccineaza") == 0){
                                            $ok += 1;
                                        }


                                    }
                                    if($ok!=3){
                                        echo "$den_medic nu este medic specialist.";
                                        $ok = 0;
                                    }
                                    if($ok==3){
                                        echo "$den_medic este medic specialist.";
                                        $ok = 0;
                                    }
                               }
                               else {
                               echo "$den_medic nu este medic specialist";
                               }

                            }
                        }
                    }
            ?>
        </div>


    </body>
</html>

