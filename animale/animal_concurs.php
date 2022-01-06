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
        <h1>Caracteristicile animalelor</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Caracteristicile minime ale animalului pentru a participa la concurs</p>
             <form action="" method="post">
             <div class="container">
                <label for="varsta">Varsta:
                <input type="text" name="varsta"><br>
                <label for="talie">Talie:
                <select name="talie" id="talie">
                  <option value="mare">mare</option>
                  <option value="mica">mica</option>
                  <option value="medie">medie</option>
                </select>
                <br>
                <label for="stapan">Animalul are stapan:
                <input type="checkbox" id="stapan" name="stapan" value="da">
                <label for="stapan">da</label>
                <input type="checkbox" id="stapan" name="stapan" value="nu">
                <label for="stapan">nu</label>
                <br>
                <label for="culoare">Culoare:
                <select name="culoare" id="culoare">
                  <option value="negru">negru</option>
                  <option value="maro">maro</option>
                  <option value="alb">alb</option>
                </select>
                <br>
                <label for="evidenta">Animalul se afla in evidenta unui medic:
                <input type="checkbox" id="evidenta" name="evidenta" value="da">
                <label for="evidenta">da</label>
                <input type="checkbox" id="evidenta" name="evidenta" value="nu">
                <label for="evidenta">nu</label>
                <br>
                <label for="gen">Gen:
                <select name="gen" id="gen">
                  <option value="masculin">masculin</option>
                  <option value="feminin">feminin</option>
                </select>
                <br>
                <br>
                <div>

                <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Search">
                <br>
            </form>
           <?php
                 $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                     {
                         $lista = "";
                         $varsta = $_POST['varsta'];
                         $talie = $_POST['talie'];
                         $stapan = $_POST['stapan'];
                         $culoare = $_POST['culoare'];
                         $evidenta = $_POST['evidenta'];
                         $gen = $_POST['gen'];


                         if((int)$varsta >= (int)$xml->reguli->regula[4]->if[0]->varsta_minima
                            and (int)$varsta <= (int)$xml->reguli->regula[4]->if[0]->varsta_maxima
                            and strcmp($talie, $xml->reguli->regula[4]->if[0]->talie)== 0
                            and strcmp($stapan, $xml->reguli->regula[4]->if[0]->stapan)== 0
                            and (strcmp($culoare, $xml->reguli->regula[4]->if[0]->culoare1)== 0
                            or strcmp($culoare, $xml->reguli->regula[4]->if[0]->culoare2)== 0)
                            and strcmp($evidenta, $xml->reguli->regula[4]->if[0]->evidenta)== 0
                            and (strcmp($gen, $xml->reguli->regula[4]->if[0]->gen1)== 0
                            or strcmp($gen, $xml->reguli->regula[4]->if[0]->gen2)== 0))  {
                                echo $xml->reguli->regula[4]->then[0]->pozitiv;
                            }
                            else{
                                echo $xml->reguli->regula[4]->then[0]->negativ;
                            }



                     }
             ?>
            </div>
        </div>
    </body>
</html>


