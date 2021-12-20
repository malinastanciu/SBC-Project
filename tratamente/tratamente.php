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
        <h1>Evidenta tratamente</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Cautare tratament</p>
            <p>Introdu numele tartamentului cautat!</p>

            <form action="" method="post">
                <input type="text" name="tratament" id="tratament" placeholder="Nume tratament"><br>
                <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Search">
            </form>
            <?php
                $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                    {
                        $ok = 0;
                        $den_tratament = $_POST['tratament'];
                        foreach ($xml->lista_tratamente->tratament as $tratament) {
                            if(strcmp($den_tratament, $tratament->nume)==0){
                                echo "<b>Informatii tratament</b><br>";
                                echo "<b>Nume:</b>$tratament->nume<br>";
                                echo "<b>Pret:</b>$tratament->pret<br>";
                            }
                        }

                    }
            ?>
            </div>
        </div>

        </div>
    </body>
</html>