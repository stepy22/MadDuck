<?php
/**
 * Created by PhpStorm.
 * User: vukas
 * Date: 11/17/2018
 * Time: 12:03 PM
 */
namespace app;

class Prodavnica
{

    public $tip;
    public $proizvodi;

//    Primena strategy paterna kako bi neko ko zeli da doda novu prodavnicu (klasu tip) morao samo da ispostuje interface
    public function __construct(\ProdavnicaInterface $prodavnica)
    {
        $this->proizvodi=$prodavnica->proizvodi;
        $this->tip = $prodavnica->tip();
    }



}
