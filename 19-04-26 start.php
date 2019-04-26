<?php

$vardas = ' Petras Jonaitis';
$amzius = 27;
$statusas = 'nedirba'; //studijuoja, dirba, nedirba

if ($amzius >= 0 && $amzius <18) {
	echo $vardas . ' yra nepilanametis';
	echo $vardas . ' netinkamas kariuomenei';
        
} elseif ($amzius >= 18 && $amzius < 65) {
	echo $vardas . ' yra pilnametis';
        
	if ($amzius <= 26) {
		if ($statusas == 'dirba' || $statusas == 'nedirba') {
			echo $vardas . ' Tinkamas kariuomenei';	
		
		} elseif($statusas == 'studijuoja') {
			echo $vardas . ' netinkamas kariuomenei';
		}
                
	} elseif($amzius >= 27) {
			echo $vardas . ' netinkamas kariuomenei';
	}
} elseif($amzius >=65) {
	echo $vardas . ' yra pensininkas';
	echo $vardas . ' netinkamas kariuomenei';
        
} elseif($amzius < 0) {
	echo 'Klaida. blogai nurodytas amzius';
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>amzius</title>
    </head>
    <body>
        
    </body>
</html>
