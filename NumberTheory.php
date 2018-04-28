<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NumberTheory
 *
 * @author lucad
 */
class NumberTheory {

    //put your code here

    public function __construct() {
        
    }

    public function isPrime($num) {
        $prime = TRUE;
        if ($num <= 1) {
            echo " Per favore inserire un numero maggiore di 1";
        } elseif ($num == 2) {
            return TRUE;
        } else {
            for ($i = 2; $i < intval(sqrt($num) + 1); $i++) {//$num
                if (($num % $i) == 0) {
                    $prime = FALSE;
                }
            }
        }if (!$prime) {
            return false;
        } else {
            return true;
        }
    }

    public function computePrimitiveRoot($num) {
        if ($this->isPrime($num)) {
            $radiciPrimitive = array();
            for ($i = 2; $i < $num; $i++) {
                $primitive = true;
                for ($j = 1; $j <= $num - 2; $j++) {
                    if (bcpowmod($i, $j, $num) == 1) {
                        $primitive = false;
                    }
                }
                if ($primitive) {
                    array_push($radiciPrimitive, $i);
                }
            }
        } else {
            echo " Inserire un numero primo ";
        }
        return $radiciPrimitive;
    }

    public function computePrimeNumber($numeroCifre = null, $min = null, $max = null) {
        $index = 4;
        if ($min != null && $max != null) {
            switch ($numeroCifre) {
                case 1:
                    while (!$this->isPrime($index)) {
                        $numeroRandom = mt_rand($min, $max);
                        $index = $numeroRandom;
                    }
                    break;
                case 2:
                    while (!$this->isPrime($index)) {
                        $numeroRandom = mt_rand($min, $max);
                        $index = $numeroRandom;
                    }
                    break;
                case 3:
                    while (!$this->isPrime($index)) {
                        $numeroRandom = mt_rand($min, $max);
                        $index = $numeroRandom;
                    }
                    break;
                case 4:
                    while (!$this->isPrime($index)) {
                        $numeroRandom = mt_rand($min, $max);
                        $index = $numeroRandom;
                    }
                    break;

                default :
                    while (!$this->isPrime($index)) {
                        $numeroRandom = mt_rand(10000, 99999);
                        $index = $numeroRandom;
                    }
                    break;
            }
        } else {
            switch ($numeroCifre) {
                case 1:
                    while (!$this->isPrime($index)) {
                        $numeroRandom = mt_rand(2, 9);
                        $index = $numeroRandom;
                    }
                    break;
                case 2:
                    while (!$this->isPrime($index)) {
                        $numeroRandom = mt_rand(10, 99);
                        $index = $numeroRandom;
                    }
                    break;
                case 3:
                    while (!$this->isPrime($index)) {
                        $numeroRandom = mt_rand(100, 999);
                        $index = $numeroRandom;
                    }
                    break;
                case 4:
                    while (!$this->isPrime($index)) {
                        $numeroRandom = mt_rand(1000, 9999);
                        $index = $numeroRandom;
                    }
                    break;

                default :
                    while (!$this->isPrime($index)) {
                        $numeroRandom = mt_rand(10000, 99999);
                        $index = $numeroRandom;
                    }
                    break;
            }
        }
        return $numeroRandom;
    }

    public function computeMCD($num1, $num2) {
        return gmp_strval(gmp_gcd($num1, $num2));
    }

    public function euclideAlgorithm($num1, $num2) {
        $euclide = array("numero" => array(), "resto" => array(), "quoziente1" => array(), "quoziente2" => array());
        $i = 1;
        if ($num1 > $num2) {
            $euclide["numero"][0] = $num1;
            $euclide["quoziente1"][0] = $num2;
        } else {
            $euclide["numero"][0] = $num2;
            $euclide["quoziente1"][0] = $num1;
        }
        $euclide["quoziente2"][0] = gmp_div_qr($euclide["numero"][0], $euclide["quoziente1"][0])[0];
        $euclide["resto"][0] = gmp_div_qr($euclide["numero"][0], $euclide["quoziente1"][0])[1];
        while (end($euclide["resto"]) != 0) {
            $euclide["numero"][$i] = $euclide["quoziente1"][$i - 1];
            $euclide["quoziente1"][$i] = $euclide["resto"][$i - 1];
            $euclide["quoziente2"][$i] = gmp_div_qr($euclide["numero"][$i], $euclide["quoziente1"][$i])[0];
            $euclide["resto"][$i] = gmp_div_qr($euclide["numero"][$i], $euclide["quoziente1"][$i])[1];
            $i++;
        }
        return $euclide;
    }

    public function euclideAlgorithmExtended($num1, $num2) {
        $x = array(0 => 0, 1 => 1);
        $y = array(0 => 1, 1 => 0);
        $soluzioni = array("x" => 0, "y" => 0);
        $risoluzioneEuclide = $this->euclideAlgorithm($num1, $num2);
        $numeroCicli = count($risoluzioneEuclide["quoziente2"]);
        for ($i = 2; $i <= $numeroCicli; $i++) {
            $x[$i] = -$risoluzioneEuclide["quoziente2"][$i - 2] * $x[$i - 1] + $x[$i - 2];
            $y[$i] = -$risoluzioneEuclide["quoziente2"][$i - 2] * $y[$i - 1] + $y[$i - 2];
        }

        if ($num1 * end($x) + $num2 * end($y) == 1) {
            $soluzioni["x"] = end($x);
            $soluzioni["y"] = end($y);
        } elseif ($num1 * (-end($x)) + $num2 * (-end($y)) == 1) {
            $soluzioni["x"] = -end($x);
            $soluzioni["y"] = -end($y);
        } elseif ($num1 * end($x) + $num2 * (-end($y)) == 1) {
            $soluzioni["x"] = end($x);
            $soluzioni["y"] = -end($y);
        } elseif ($num1 * (-end($x)) + $num2 * end($y) == 1) {
            $soluzioni["x"] = -end($x);
            $soluzioni["y"] = end($y);
        } elseif ($num1 * end($y) + $num2 * end($x) == 1) {
            $soluzioni["x"] = end($y);
            $soluzioni["y"] = end($x);
        } elseif ($num1 * (-end($y)) + $num2 * (-end($x)) == 1) {
            $soluzioni["x"] = -end($y);
            $soluzioni["y"] = -end($x);
        } elseif ($num1 * (-end($y)) + $num2 * end($x) == 1) {
            $soluzioni["x"] = -end($y);
            $soluzioni["y"] = end($x);
        } elseif ($num1 * end($y) + $num2 * (-end($x)) == 1) {
            $soluzioni["x"] = end($y);
            $soluzioni["y"] = -end($x);
        } else {
            echo "La somma non da 1";
        }
        return $soluzioni;
    }

    public function computeEquivalentCongruence($a, $modn) {
        return gmp_strval(gmp_mod($a, $modn));
    }

    /* a*x=b*mod(n) */

    public function computeEquationCongruence($a, $b, $modn) {
        $valoriCongruenza = $this->computeEquivalentCongruence($b, $modn);
        if ($this->computeMCD($valoriCongruenza["a"], $valoriCongruenza["modn"]) == 1) {
            $soluzioni = $this->euclideAlgorithmExtended($valoriCongruenza["a"], $valoriCongruenza["modn"]);
            return $this->computeEquivalentCongruence($b * $soluzioni["x"], $modn);
        } else {
            echo ' Il caso in cui MCD > 1 non è ancora stato implementato ';
        }
    }

    public function computeInverse($a, $modn) {
        return gmp_strval(gmp_invert($a, $modn));
    }

}
