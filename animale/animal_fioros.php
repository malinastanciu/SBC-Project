<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../animale/animale.css">
        <link rel="stylesheet" href="../static/bootstrap.min.css">

    </head>
    <title>Animale</title>
    <body>
        <form action="../animale/prezentare.php" method="GET">
            <button type="submit" id="btn1" class="btn btn-danger btn-xs">Inapoi</button>
         </form>
        <h1>Evidenta animalelor in functie de trasaturi</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Gasirea caracteristicii definitorii in functie de animal</p>
             <form action="" method="post">
                <input type="text" name="animal" placeholder="Introduceti numele animalului">
                <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Search">
            </form>
           <?php
                 $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                     {
                         $lista = "";
                         $den_animal = $_POST['animal'];
                         for($i = 0; $i<4; $i++){
                             foreach($xml->lista_animale->animal as $animal){
                                if(strcmp($den_animal, $animal->nume)==0){
                                    if(strcmp($animal->talie, $xml->reguli->regula[0]->if[$i]->talie) == 0 and strcmp($animal->gen, $xml->reguli->regula[0]->if[$i]->gen)==0 and strcmp($animal->culoare, $xml->reguli->regula[0]->if[$i]->culoare) == 0) {
                                     $lista .= $xml->reguli->regula[0]->then[$i]->trasatura;
                                    }
                                }
                             }
                         }

                        echo "Trasatura este: ".$lista;
                     }
             ?>
            </div>
        </div>
    </body>
</html>


