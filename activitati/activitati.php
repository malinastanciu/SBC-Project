<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../activitati/activitati.css">
        <link rel="stylesheet" href="../static/bootstrap.min.css">

    </head>
    <title>Activitati</title>
    <body>
        <form action="../activitati/prezentare.php" method="GET">
            <button type="submit" id="btn1" class="btn btn-danger btn-xs">Inapoi</button>
         </form>
        <h1>Evidenta activitatilor cabinetului veterinar</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Verificare luna profitabila</p>

             <form action="" method="POST">
                <input type="text" id="luna" name="luna" placeholder="Introduceti luna">
                <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Search">
            </form>
             <?php
                 $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                     {
                         $lista = "";
                         $luna = $_POST['luna'];

                         foreach($xml->lista_vizite->vizita as $vizita){
                            if (strcmp($luna, $vizita->luna) == 0){
                                foreach($vizita->lista_activitati->nume  as $activitate){
                                    echo $activitate. " ";
                                }
                            }
                         }
                         echo "<br>";
                         for($i = 0; $i<4; $i++){
                            if(strcmp($luna, $xml->reguli->regula[1]->if[$i]->luna) == 0) {
                                 echo "Luna ".$luna." este o luna ".$xml->reguli->regula[1]->then[$i]->mesaj.".";
                            }
                         }

                     }
             ?>
            </div>
        </div>
    </body>
</html>


