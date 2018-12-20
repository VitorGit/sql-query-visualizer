<?php

    var_dump( isDotSeparatedFloat('1.0') == true);
    var_dump( isDotSeparatedFloat('1.000') == false);
    var_dump( isDotSeparatedFloat('1.00') == true);
    var_dump( isDotSeparatedFloat('00.01') == true);		
    var_dump( isDotSeparatedFloat('10.01') == true);
    var_dump( isDotSeparatedFloat('1.002,00') == false);
    var_dump( isDotSeparatedFloat('1,002.001') == true);
    var_dump( isDotSeparatedFloat('1.002,001') == false);
    var_dump( isDotSeparatedFloat('ola') == false);
    var_dump( isDotSeparatedFloat('aa.bb') == false);
    var_dump( isDotSeparatedFloat('a1.b2') == false);
    var_dump( isDotSeparatedFloat('00000000000000000000') == false);
    var_dump( isDotSeparatedFloat('1,2321,343243,4') == false);

    function isDotSeparatedFloat($string){
            if(strpos($string, '.') == false) return false;

            if(preg_match('/[^0-9,.]/', $string)) return false;

            //se houver um zero antes do ponto
            if(substr($string, 0, 2) == '0.') return true;

            //se a virgula vier antes do ponto
            if(strpos($string, ',') !== false && strpos($string, ',') < strpos($string, '.') ) return true;

            //se houver menos de 3 chars depois do ponto
            $afterDot = explode('.', $string)[1];
            if(strlen($afterDot) < 3) return true;

            return false;
    }