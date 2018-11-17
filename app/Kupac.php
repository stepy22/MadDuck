<?php
/**
 * Created by PhpStorm.
 * User: vukas
 * Date: 11/17/2018
 * Time: 12:57 PM
 */

namespace app;


class Kupac
{
    public $ime;
    public $novac;
    public $spisak;

    /*
     * potrebno proslediti $ime, $novac i $spisak*/
    public function __construct($ime,$novac,$spisak)
    {
        $this->ime=$ime;
        $this->novac=$novac;
        $this->spisak=$spisak;
    }


}