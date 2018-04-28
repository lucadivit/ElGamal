<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VCifrazione
 *
 * @author lucad
 */
class VCifrazione extends View {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function stampaCifrazione($valoriCifrazione) {
        $this->assegnaValori($reference, $value);
        // $this->prelevaTemplate("elgamal");
    }

    public function getTestoDaCifrare() {
        if ($_REQUEST["messaggio"] != null) {
            return $_REQUEST["messaggio"];
        } else {
            return null;
        }
    }

    public function sendCypherData($cypherData = array()) {
        $data = json_encode($cypherData);
        echo $data;
    }

    public function sendAttackData($attackData = array()) {
        $data = json_encode($attackData);
        echo $data;
    }

}
