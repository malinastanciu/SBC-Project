<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../animale/animale.css">
        <link rel="stylesheet" href="../static/bootstrap.min.css">

    </head>
    <title>Tratamente</title>
    <body>
        <form action="../tratamente/prezentare.php" method="GET">
            <button type="submit" id="btn1" class="btn btn-danger btn-xs">Inapoi</button>
         </form>
        <h1>Tratament intre doua intervale de pret</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Cautare tratament</p>
            <p>Introdu intervalele de pret</p>

            <form action="" method="post">
                <input type="numeric" name="pret_minim" id="pret_minim" placeholder="Pretul minim"><br>
                <input type="numeric" name="pret_maxim" id="pret_maxim" placeholder="Pretul maxim"><br>
                <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Search">
            </form>
             <?php
                 $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                     {
                         $lista = "";
                         $pret_minim = $_POST['pret_minim'];
                         $pret_maxim = $_POST['pret_maxim'];
                         for($i = 0; $i<2; $i++){
                            if(strcmp($pret_minim, $xml->reguli->regula[2]->if[$i]->pret_minim) == 0 and strcmp($pret_maxim, $xml->reguli->regula[2]->if[$i]->pret_maxim) == 0) {
                                for($j=0; $j<count($xml->reguli->regula[2]->then[$i]->tratament); $j++){
                                    $lista .= $xml->reguli->regula[2]->then[$i]->tratament[$j];
                                    $lista .= ", ";
                                }
                            }

                         }
                        $lista = substr_replace($lista, "", -2);
                        echo "Tratamentele sunt: ".$lista;
                     }
             ?>
            </div>
        </div>

        </div>
    </body>
</html>