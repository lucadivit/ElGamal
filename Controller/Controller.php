<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "./View/View.php";

/**
 * Description of Controller
 *
 * @author lucad
 */
class Controller {

    private $view;

    public function __construct() {
        $this->view = new View();
    }

    public function smistaRichiesta($richiesta = null) {
        if ($richiesta != null) {
            $richiesta = $richiesta;
        } else {
            $richiesta = $this->view->getController();
        }
        switch ($richiesta) {
            case "cifrazione":
                include './Controller/CCifrazione.php';
                $ccifrazione = new CCifrazione();
                $ccifrazione->smistaRichiesta();
                break;
            case "slide":
                include './Controller/CSlide.php';
                $cslide = new CSlide();
                $cslide->smistaRichiesta();
                break;
            default:
                $this->view->stampaTemplate("index");
                break;
        }
    }

}
