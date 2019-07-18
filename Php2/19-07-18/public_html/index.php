<?php

class ThailandSurprise {
    public $clothes;

    public function __construct($clothes){
        $this->clothes = $clothes;
    }
}

$new_clothes = new ThailandSurprise('miniskirt');
print $new_clothes->clothes;

?>

