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
                        $ok = 0;
                        $pret_minim = $_POST['pret_minim'];
                        $pret_maxim = $_POST['pret_maxim'];
                        foreach ($xml->lista_tratamente->tratament as $tratament) {
                            if(($tratament->pret >= $pret_minim) && ($tratament->pret <= $pret_maxim)){
                                echo "<b>Informatii tratament:</b>";
                                echo "$tratament->nume ";
                                echo "$tratament->pret lei<br>";

                            }
                        }

                    }
            ?>
            </div>
        </div>

        </div>
    </body>
</html>