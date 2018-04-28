<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './smarty/libs/Smarty.class.php';

/**
 * Description of View
 *
 * @author lucad
 */
class View extends Smarty {

    public function __construct() {
        parent::__construct();
        $this->setSmartyConfig();
    }

    private function setSmartyConfig() {
        $this->setTemplateDir('./smarty/templates');
        $this->setCompileDir('./smarty/templates_c');
        $this->setCacheDir('./smarty/cache');
        $this->setConfigDir('./smarty/configs');
    }

    public function prelevaTemplate($tpl) {
        return $this->fetch($tpl . ".tpl");
    }

    public function stampaTemplate($tpl) {
        $this->display($tpl . ".tpl");
    }

    public function assegnaValori($reference, $value) {
        $this->assign($reference, $value);
    }

    public function getController() {
        if (isset($_REQUEST["controller"])) {
            return $_REQUEST["controller"];
        } else {
            return null;
        }
    }

    public function getTask() {
        if (isset($_REQUEST["task"])) {
            return $_REQUEST["task"];
        } else {
            return null;
        }
    }

}
