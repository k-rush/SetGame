<?php
include 'SetGameController.php';
session_start();

class Action_Ajax {
    public $controller;
    
    public function submitSet($request) {
        $controller = $_SESSION["sgc"];
        $controller->submitSet();
    }
    
    public function establishHand(){
        $controller = new SetGameController();
        $_SESSION["sgc"] = $controller;
    }
    
    public function getCardList($request) {
        /*if (isset($_SESSION["dao"])) {
            $dao = $_SESSION["dao"];
        } else {
            $dao = new SetGameDAO();
            $_SESSION["dao"] = $dao;
        }*/
        $controller = new SetGameController();
        //$hand = $sgc->getHand();

       
        echo json_encode($dao->getHand());
        
    }
    
}    
?>
