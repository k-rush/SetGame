<?php

class SetGameController {
    public $hand;
    public $cardChoices;
    
    function __construct() {
       
    }
    function __destruct() {
        
    }
    function getHand() {
        
        return array(11, 21, 33, 42, 15, 65, 17, 80, 29, 1, 31, 48);
    }
    
    function submitSet(){
            $cards = array();
            for($i=0;$i<3;$i++){
                $cards[$i]=array_shift($this->cardChoices);
            }
            $_SESSION["deck"] = $this->cardChoices;
            echo json_encode($cards);
        }
}
?>
