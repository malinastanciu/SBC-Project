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
        <h1>Evidenta animalelor fara stapan</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Afisarea animalelor fara stapan</p>

            <form action="" method="post">
                <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Search">
            </form>
            <?php
                $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                    {
                        $ok = 0;
                        foreach ($xml->lista_animale->animal as $animal) {
                            foreach ($xml->lista_stapani->stapan as $stapan){
                                if(strcmp($animal->nume, $stapan->animal)==0){
                                    $ok = $ok + 1;
                                }
                            }
                            if($ok == 0){
                                echo "$animal->nume <br>";
                            }
                            $ok = 0;
                        }
                    }
            ?>
            </div>
        </div>
    </body>
</html>