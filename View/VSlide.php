<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VSlide
 *
 * @author lucad
 */
class VSlide extends View{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function stampaSlide($linkSlide) {
        $this->assegnaValori("link", $linkSlide);
        echo $this->prelevaTemplate("slide");
    }
}
