<?php
/**
 * Created by PhpStorm.
 * User: vukas
 * Date: 11/17/2018
 * Time: 12:06 PM
 */
namespace app;
class Market implements \ProdavnicaInterface
{

    public $proizvodi;
    public function __construct()
    {
        $this->proizvodi['hleb']=[
            'kolicina'=>250,
            'cena'=>11
        ];
        $this->proizvodi['sok']=[
            'kolicina'=>321,
            'cena'=>77
        ];

    }

    public function tip(){

        return 'Market';
    }

}