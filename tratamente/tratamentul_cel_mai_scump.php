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
        <h1>Tratamentul cel mai scump</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Cautare tratament</p>

            <form action="" method="post">
                <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Gasirea celui mai scump tratament">
            </form>
            <?php
                $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                    {
                        (int)$pret = 0;
                        foreach ($xml->lista_tratamente->tratament as $tratament) {
                            if((int)$tratament->pret > (int)$pret){
                                $pret = (int)$tratament->pret;

                            }
                        }
                        echo "$pret";
                    }
            ?>
            </div>
        </div>

        </div>
    </body>
</html>