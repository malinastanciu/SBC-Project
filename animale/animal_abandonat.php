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
        <h1>Evidenta animalelor abandonate</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Verificarea statusului animalelor</p>

            <form action="" method="post">
                <input type="text" name="animal" placeholder="Introduceti numele animalului">
                <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Search">
            </form>
            <?php
                $xml = simplexml_load_file("../cabinet.xml");
                    if(isset($_POST['search']))
                    {   $den_animal = $_POST['animal'];
                        $ok = 0;
                        $ok2 = 0;
                        foreach ($xml->lista_animale->animal as $animal) {
                        if(strcmp($den_animal, $animal->nume) == 0){
                            foreach ($xml->lista_stapani->stapan as $stapan){
                                if(strcmp($animal->nume, $stapan->animal)==0){
                                    $ok = $ok + 1;
                                }
                            }
                            if($ok == 0){
                                foreach ($xml->lista_medici->medic->lista_evidenta->animal as $animal2){
                                    if(strcmp($animal->nume, $animal2->nume) != 0){
                                        $ok2 = 1;
                                    }

                                }
                            }
                            if($ok2 == 1){
                                echo "$den_animal este un animal abandonat.";
                            }
                            else{
                                echo "$den_animal nu este un animal abandonat.";
                            }
                            $ok = 0;
                            $ok2 = 0;
                            }
                        }
                    }
            ?>
            </div>
        </div>
    </body>
</html>