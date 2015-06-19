<?php
include 'SetGameController.php';

class SetGameDAO {
    private $_mysqli;
    private $zipLookupQuery = "SELECT zip, city, full_state, state, latitude, longitude FROM zip_codes WHERE zip=?";
    private $zipLookupStmt;
    
    function __construct() {
    }

    function __destruct() {
        //$con = $this->getDBConnection();
        //$con->close();
    }

    private function getDBConnection() {
        if (!isset($_mysqli)) {
            $_mysqli = new mysqli("localhost", "root", "", "ajaxexample");
            if ($_mysqli->errno) {
                printf("Unable to connect: %s", $_mysqli->error);
                exit();
            }
        }
        return $_mysqli;
    }
    
    public function retrieveHand() {
        $SGC = new SetGameController();
        return $SGC->getHand();
        
    }

    
}

?>
