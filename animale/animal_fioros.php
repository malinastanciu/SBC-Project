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
        <h1>Evidenta animalelor fioroase</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Verificarea animal fioros</p>
            <?php
            $xml=simplexml_load_file("../cabinet.xml") or die("Error: Cannot create object");

                function decode($nr_reg,$nr_repr,$xml)
                {
                    $regula = $xml->reguli->regula[$nr_reg];
                    $repr = $xml->lista_animale->animal[$nr_repr];
                    $nr_rel =0;
                    $nr_rel_true =0;
                    foreach($regula->if->var as $var)
                    {
                        foreach($repr->children() as $child)
                            if($child->getName()==$regula->if->what[$nr_rel])
                                if($regula->if->rel[$nr_rel] == 'este')
                                    if(print_r($var,true) == print_r($child,true))
                                        $nr_rel_true++;
                        $nr_rel++;
                    }
                    if($nr_rel==$nr_rel_true)
                        foreach($repr->children() as $child)
                            if($child->getName()==$regula->then->what)
                                $repr->{$regula->then->what} = $regula->then->var;
                }
            ?>
             <form action="" method="post">
                <input type="text" name="animal" placeholder="Introduceti numele animalului">
                <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Search">
            </form>
            <?php

                $i=0;
                if(isset($_POST['animal']))
                foreach($xml->lista_animale->animal as $repr)
                {
                    if($repr->nume==$_POST['animal'])
                    {
                        decode(0,$i,$xml);
                        echo 'Nume: '.$repr->nume;
                        echo '<br>Trasatura: '.$repr->trasatura;
                    }
                    $i++;
                }
            ?>
            </div>
        </div>
    </body>
</html>


