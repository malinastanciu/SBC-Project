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
        <h1>Evidenta animale</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Cautare animal</p>
            <p>Introdu numele animalului cautat!</p>

            <form action="" method="post">
                <input type="text" name="animal" id="medic" placeholder="Nume animal"><br>
                <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Search">
            </form>
            <?php
                $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                    {
                        $den_animal = $_POST['animal'];
                        foreach ($xml->lista_animale->animal as $animal) {
                            if(strcmp($animal->nume, $den_animal)==0){
                                echo "<b>Informatii animal</b><br>";
                                echo "<b>Nume:</b>$animal->nume<br>";
                                echo "<b>Varsta:</b>$animal->varsta<br>";
                                echo "<b>Talie:</b>$animal->talie<br>";
                                echo "<b>Culoare:</b>$animal->culoare<br>";
                                echo "<b>Gen:</b>$animal->gen<br>";
                                foreach ($xml->lista_stapani->stapan as $stapan){
                                if (strcmp($stapan->animal, $animal->nume)==0){
                                echo "<b>Stapan:</b>$stapan->nume<br>";
                                }
                                }


                            }
                        }
                    }
            ?>
            </div>
        </div>

        </div>
    </body>
</html>