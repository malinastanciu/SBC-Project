<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../animale/animale_talie_gen.css">
        <link rel="stylesheet" href="../static/bootstrap.min.css">

    </head>
    <title>Animale</title>
    <body>
        <form action="../animale/prezentare.php" method="GET">
            <button type="submit" id="btn1" class="btn btn-danger btn-xs">Inapoi</button>
         </form>
        <h1>Evidenta animale</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Cautare animal</p>
            <p>Introduceti talia si genul</p>

            <form action="" method="post">
                    <input type="text" name="gen" id="gen" placeholder="gen"><br>
                    <h5>Selectati talia:</h5>
                    <input type="checkbox" id="talie" name="talie" value="mare">
                    <label for="talie">mare</label><br>
                    <input type="checkbox" id="talie" name="talie" value="medie">
                    <label for="talie">medie</label><br>
                    <input type="checkbox" id="talie" name="talie" value="mica">
                    <label for="talie">mica</label><br>

                  <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Search">
            </form>
           <?php
                 $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                     {
                         $lista = "";
                         $talie = $_POST['talie'];
                         $gen = $_POST['gen'];
                         for($i = 0; $i<3; $i++){
                            if(strcmp($talie, $xml->reguli->regula[3]->if[$i]->talie) == 0 and strcmp($gen, $xml->reguli->regula[3]->if[$i]->gen) == 0) {
                                 $lista .= $xml->reguli->regula[3]->then[$i]->animal->nume;
                                 $lista .= " ";
                                 $lista .= $xml->reguli->regula[3]->then[$i]->animal->varsta;
                                 $lista .= ", ";
                            }

                         }
                        $lista = substr_replace($lista, "", -2);
                        echo "Animalele sunt: ".$lista;
                     }
             ?>
            </div>
        </div>

        </div>
    </body>
</html>