<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './View/VSlide.php';

/**
 * Description of CSlide
 *
 * @author lucad
 */
class CSlide {

    //put your code here
    private $vslide;

    public function __construct() {
        $this->vslide = new VSlide();
    }

    public function smistaRichiesta($richiesta = null) {
        if ($richiesta != null) {
            $richiesta = $richiesta;
        } else {
            $richiesta = $this->vslide->getTask();
        }

        switch ($richiesta) {
            case "slide":
                $this->recuperaSlide();
                break;
            default:
                break;
        }
    }

    public function recuperaSlide() {
        $this->vslide->stampaSlide("./COMBINATORIA E CRITTOGRAFIA.pdf");
    }

}
