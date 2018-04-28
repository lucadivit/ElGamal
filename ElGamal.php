<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './NumberTheory.php';

/**
 * Description of ElGamal
 *
 * @author lucad
 */
class ElGamal {

    //put your code here

    private $p;
    private $beta;
    private $alpha;
    private $a;
    private $k;
    private $t;
    private $r;
    private $arrayT = array();
    private $arrayLettere = array();
    private $messaggio;
    private $numeroCifre = 3;
    private $lettera;

    public function __construct() {
        ;
    }

    public function calcolaTernaPBetaAlpha() {
        $nT = new NumberTheory();
        if ($this->numeroCifre == 3) {
            $this->setP($nT->computePrimeNumber($this->numeroCifre, 256, 999));
        } else {
            $this->setP($nT->computePrimeNumber($this->numeroCifre));
        }
        $radiciPrimitive = $nT->computePrimitiveRoot($this->getP());
        $this->setAlpha($radiciPrimitive[rand(0, count($radiciPrimitive) - 1)]);
        $this->setA(rand(1, $this->getP() - 1));
        $this->setBeta(bcpowmod($this->getAlpha(), $this->getA(), $this->getP()));
        $this->setK(rand(1, $this->getP() - 1));
        return array("p" => $this->getP(), "alpha" => $this->getAlpha(), "beta" => $this->getBeta(), "a" => $this->getA(), "k" => $this->getK());
    }

    public function calcolaCoppiaRT() {
        $nT = new NumberTheory();
        $this->setR(bcpowmod($this->getAlpha(), $this->getK(), $this->getP()));
        $this->setT($nT->computeEquivalentCongruence(bcmul(bcpowmod($this->getBeta(), $this->getK(), $this->getP()), $this->getLettera()), $this->getP()));
        array_push($this->arrayT, $this->getT());
        return array("t" => $this->getT(), "r" => $this->getR());
    }

    public function cifra($messaggio) {
        $messaggioCifrato = "";
        $this->setMessaggio($messaggio);
        $this->calcolaTernaPBetaAlpha();
        $arrayLettere = $this->convertFromAsciiToInt($messaggio);
        for ($i = 0; $i < count($arrayLettere); $i++) {
            if ($arrayLettere[$i] > $this->getP()) {
                echo " lettera=" . $arrayLettere[$i] . " p=" . $this->getP() . " ";
                echo " Il messaggio deve essere minore di p ";
                return 0;
            } else {
                $this->setLettera($arrayLettere[$i]);
                $cypher = $this->calcolaCoppiaRT();
                $messaggioCifrato = $messaggioCifrato . $cypher["t"] . "/" . $cypher["r"] . "/";
            }
        }
        $messaggioCifrato = $this->setToPrintCypherText($messaggioCifrato);
        return $messaggioCifrato;
    }

    private function setToPrintCypherText($messaggioCifrato) {
        $cypherArray = explode("/", $messaggioCifrato);
        $messaggioInBinario = "";
        $messaggioCifrato = "";
        if (end($cypherArray) == null) {
            array_pop($cypherArray);
        } else {
            //
        }
        foreach ($cypherArray as $value) {
            $messaggioInBinario = $messaggioInBinario . decbin($value);
        }
        $cypherArray = str_split($messaggioInBinario, 7);
        foreach ($cypherArray as $value) {
            if (bindec($value) >= 65 && bindec($value) <= 90) {
                $messaggioCifrato = $messaggioCifrato . chr(bindec($value));
            } elseif (bindec($value) >= 97 && bindec($value) <= 122) {
                $messaggioCifrato = $messaggioCifrato . chr(bindec($value));
            } else {
                $messaggioCifrato = $messaggioCifrato . bindec($value);
            }
        }
        return $messaggioCifrato;
    }

    public function decifra($a = null) {
        $nT = new NumberTheory();
        $messaggioDecifrato = "";
        if ($a != null) {
            for ($i = 0; $i < count($this->arrayLettere); $i++) {
                $r_a = $nT->computeInverse(bcpowmod($this->getR(), $a, $this->getP()), $this->getP());
                $messaggioDecifrato = $messaggioDecifrato . chr($nT->computeEquivalentCongruence(bcmul($this->arrayT[$i], $r_a), $this->getP()));
            }
        } else {
            for ($i = 0; $i < count($this->arrayLettere); $i++) {
                $r_a = $nT->computeInverse(bcpowmod($this->getR(), $this->getA(), $this->getP()), $this->getP());
                $messaggioDecifrato = $messaggioDecifrato . chr($nT->computeEquivalentCongruence(bcmul($this->arrayT[$i], $r_a), $this->getP()));
            }
        }
        return $messaggioDecifrato;
    }

    public function convertFromAsciiToInt($messaggio) {
        $messaggio = strtolower($messaggio);
        for ($i = 0; $i < strlen($messaggio); $i++) {
            $letter = $messaggio[$i];
            array_push($this->arrayLettere, ord($letter));
        }
        return $this->arrayLettere;
    }

    public function BSGSAttack() {
        $nT = new NumberTheory();
        $x = null;
        $coincidenza = false;
        $N = sqrt($this->getP() - 1) + 1;
        $listaBabySteps = array("a" => array(), "j" => array());
        $listaGiantSteps = array("a" => array(), "k" => array());
        for ($j = 0; $j < $N; $j++) {
            $listaBabySteps["a"][$j] = bcpowmod($this->getAlpha(), $j, $this->getP());
            $listaBabySteps["j"][$j] = $j;
        }
        for ($k = 0; $k < $N; $k++) {
            $z = 0;
            $alpha_Nk = $nT->computeInverse(bcpowmod($this->getAlpha(), $N * $k, $this->getP()), $this->getP());
            $listaGiantSteps["a"][$k] = $nT->computeEquivalentCongruence($alpha_Nk * $this->getBeta(), $this->getP());
            $listaGiantSteps["k"][$k] = $k;
            while ($z < count($listaBabySteps["a"])) {
                if ($listaBabySteps["a"][$z] == $listaGiantSteps["a"][$k]) {
                    $x = $listaBabySteps["j"][$z] + $N * $k;
                    $coincidenza = true;
                    $z = count($listaBabySteps["a"]);
                } else {
                    $z++;
                }
            }
            if ($coincidenza) {
                $k = $N;
            } else {
                $k = $k;
            }
        }
        return array("a" => intval($x), "m" => $this->decifra(intval($x)));
    }

    public function setLettera($lettera) {
        $this->lettera = $lettera;
    }

    public function getLettera() {
        return $this->lettera;
    }

    public function setMessaggio($m) {
        $this->messaggio = $m;
    }

    public function getMessaggio() {
        return $this->messaggio;
    }

    public function setNumeroCifre($numero) {
        if ($numero <= 2) {
            echo "Un numero di cifre minore di 3 non è sicuro. Impostato a 3";
        } else {
            $this->numeroCifre = $numero;
        }
    }

    public function getNumeroCifre() {
        return $this->numeroCifre;
    }

    public function setP($p) {
        $this->p = $p;
    }

    public function setK($k) {
        $this->k = $k;
    }

    public function setR($r) {
        $this->r = $r;
    }

    public function getR() {
        return $this->r;
    }

    public function setT($t) {
        $this->t = $t;
    }

    public function getK() {
        return $this->k;
    }

    public function getT() {
        return $this->t;
    }

    public function setBeta($beta) {
        $this->beta = $beta;
    }

    public function setAlpha($alpha) {
        $this->alpha = $alpha;
    }

    public function setA($a) {
        $this->a = $a;
    }

    public function getP() {
        return $this->p;
    }

    public function getBeta() {
        return $this->beta;
    }

    public function getAlpha() {
        return $this->alpha;
    }

    public function getA() {
        return $this->a;
    }

}
