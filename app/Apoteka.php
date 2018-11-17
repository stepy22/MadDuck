<?php
/**
 * Created by PhpStorm.
 * User: vukas
 * Date: 11/17/2018
 * Time: 12:06 PM
 */
namespace app;
require 'ProdavnicaInterface.php';
class Apoteka implements \ProdavnicaInterface
{

    public $proizvodi;
    public function __construct()
    {
        $this->proizvodi['lek']= [
                'kolicina'=>500,
                'cena'=>30
            ];
        $this->proizvodi['sirup']=[
            'kolicina'=>200,
            'cena'=>20
        ];
    }

    public function tip(){

        return 'Apoteka';
    }


}