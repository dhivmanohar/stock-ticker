<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Playerstocks extends MY_Model2 {
    
    function __construct() {
        parent::__construct('playerstocks','username','code');
    }
    
    function getPlayerStocks($name) {
        $res = $this->some('username', $name);
        $newRes = array();
        foreach($res as $queryIndex) {
            $tmpRes = array();
            array_push($tmpRes, $queryIndex->code, $queryIndex->amount);
            array_push($newRes, $tmpRes);
        }
        return $newRes;
    }
    
    function getPlayerStocksAndNames($name) {
        $res = $this->getPlayerStocks($name);
        $newRes = array();
        foreach($res as $queryIndex) {
            $tmpRes = array();
            array_push($tmpRes, $queryIndex[0], $this->stocks->getStockByCode($queryIndex[0])[0], $queryIndex[0], $queryIndex[1]);
            array_push($newRes, $tmpRes);
        }
        return $newRes;
    }
}