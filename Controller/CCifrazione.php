<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './View/VCifrazione.php';
include './ElGamal.php';

/**
 * Description of CCifrazione
 *
 * @author lucad
 */
class CCifrazione {

    private $vcifrazione;
    private $elGamal;

    public function __construct() {
        $this->vcifrazione = new VCifrazione();
        $this->elGamal = new ElGamal();
    }

    public function smistaRichiesta($richiesta = null) {
        if ($richiesta != null) {
            $richiesta = $richiesta;
        } else {
            $richiesta = $this->vcifrazione->getTask();
        }
        switch ($richiesta) {
            case "cifrazione":
                $data = array();
                $data["cypher"] = $this->cifra();
                $data["decypher"] = $this->decifra();
                $data["a"]=  $this->attack()["a"];
                $data["message"]=  $this->attack()["m"];
                $this->vcifrazione->sendCypherData($data);
                break;
            case "elgamal":
                echo $this->vcifrazione->prelevaTemplate("elgamal");
            default:
                break;
        }
    }

    public function cifra() {
        return $this->elGamal->cifra($this->vcifrazione->getTestoDaCifrare());
    }
    
    public function decifra() {
        return $this->elGamal->decifra();
    }
    
    public function attack() {
        return $this->elGamal->BSGSAttack();
    }
}
