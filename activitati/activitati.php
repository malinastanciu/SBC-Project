<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../activitati/activitati.css">
        <link rel="stylesheet" href="../static/bootstrap.min.css">

    </head>
    <title>Activitati</title>
    <body>
        <form action="../activitati/prezentare.php" method="GET">
            <button type="submit" id="btn1" class="btn btn-danger btn-xs">Inapoi</button>
         </form>
        <h1>Evidenta activitatilor cabinetului veterinar</h1>

        <div id="cautare_animal" class="container">
            <p id="cautare">Verificare luna profitabila</p>
            <?php
            $xml=simplexml_load_file("../cabinet.xml") or die("Error: Cannot create object");

                function decode($nr_reg,$nr_repr,$xml)
                {
                    $regula = $xml->reguli->regula[$nr_reg];
                    $repr = $xml->lista_vizite->vizita[$nr_repr];
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
                <input type="text" name="luna" placeholder="Introduceti luna">
                <input type="submit" class="btn btn-info btn-md" name="search" placeholder="Search">
            </form>
            <?php

                $i=0;
                if(isset($_POST['luna'])){

                    foreach($xml->lista_vizite->vizita as $repr)
                    {
                        if($repr->luna==$_POST['luna'])
                        {
                            decode(1,$i,$xml);
                            echo 'Luna: '.$repr->luna;
                            echo '<br>Profit: '.$repr->profit;
                        }
                        $i++;
                    }
                    }
            ?>
            </div>
        </div>
    </body>
</html>


