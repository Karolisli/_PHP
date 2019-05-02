<?php
/**
 * 
 * @param type $array
 * @return type
 */
function avg($array) {
    $sum = 0;
    foreach ($array as $value) {
        $sum += $value;        
    }
    return $sum / count($array);
};

$skaiciai = [12, 43, 654, 23];

print avg($sakiciai);

//-----------------------------
function crap(){
      
    print date("Y/m/d");
    
}

crap();
?>