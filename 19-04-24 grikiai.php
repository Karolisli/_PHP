<?php

        $grikiai = 5000;
        $praejo_dienu = 0;

        for (; $grikiai > 0;) {
            $per_diena = rand(200, 500);
            $praejo_dienu += 1; 
            $grikiai -= $per_diena;
            print ("suvalgysiu $per_diena ir liks $grikiai grikiu") . '<br>';
        }

    $thedate = date('Y-M-d', strtotime("+$praejo_dienu days"));
    $text = "grikiai baigsis $thedate data";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>ciklai</title>
        
    </head>
    <body>
        <section>
            <p>
                <?php print $text; ?>
            </p>
        </section>
    </body>
</html>



