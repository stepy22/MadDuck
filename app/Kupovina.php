<?php
/**
 * Created by PhpStorm.
 * User: vukas
 * Date: 11/17/2018
 * Time: 12:55 PM
 */

namespace app;


class Kupovina
{
    public $spisak;
    public $prodavnica;
    public $tip;
    public $racun;
   public $kupac;
   public $iznosRacuna;
   public $infoKupovina;
    public function __construct($prodavnica,$kupac)
    {
        $this->spisak=$kupac->spisak;
        $this->kupac=$kupac;
        $this->prodavnica=$prodavnica;

    }
    public function kupi(){
//        Pokrecemo kasu nakon toga proveravamo stanje da li kupac moze da izvrsi placanje
        $this->kasa();
        if($this->iznosRacuna > $this->kupac->novac){
            return 'Nemate dovoljno sredstava';
        }
        $this->log();
        return $this->racun;


    }
    public function log(){
//        Logujemo dogadjaj koji se desio prilikom kupovine
        $myfile = fopen("Izvestaji_Kupovina/Kupovina-".rand(1,100000).".txt", "w") or die("Unable to open file!");
        $txt='';
        foreach ($this->infoKupovina as $kupovina){
            $txt.='tip Kupovine: '.$kupovina['tipKupovine'].' Tip proizvoda: '.$kupovina['tipProizvoda'].' Cena Proizvoda: '.$kupovina['cenaProizvoda'].' Staro stanje: '.$kupovina['staroStanje'];
            $txt.='Novo stanje: '.$kupovina['novoStanje'].' vreme kupovine '.$kupovina['vremeKupovine'].' '.PHP_EOL;
        }
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    private function kasa(){
        /*Simulacija kase, info o kupovini ne ubacujemo direktno u fajl vec u property kako bi bili reusabilni*/
        $i=0;
        foreach($this->spisak as $spisak){
            $this->infoKupovina[$i]['tipKupovine']=$this->prodavnica->tip;
            $this->infoKupovina[$i]['tipProizvoda']=$spisak['tip'];
            $this->infoKupovina[$i]['cenaProizvoda']=$this->prodavnica->proizvodi[$spisak['tip']]['cena'];
            $this->infoKupovina[$i]['staroStanje']=$this->prodavnica->proizvodi[$spisak['tip']]['kolicina'];
            $this->infoKupovina[$i]['novoStanje']=$this->prodavnica->proizvodi[$spisak['tip']]['kolicina'] - $spisak['kolicina'];
            $this->infoKupovina[$i]['vremeKupovine']=date('d.m.y H:i');
//            Smanjujemo kolicinu proizvoda u prodavnici
            $this->prodavnica->proizvodi[$spisak['tip']]['kolicina']-=$spisak['kolicina'];
//            skidamo novac sa racuna kupcu
            $this->kupac->novac-=$this->prodavnica->proizvodi[$spisak['tip']]['cena'] * $spisak['kolicina'];
//            Dodajemo cenu stavke na racun
             $this->iznosRacuna+= $this->prodavnica->proizvodi[$spisak['tip']]['cena'] * $spisak['kolicina'];
//             dodajemo stavku na racun
             $this->racun[]=['tip'=>$spisak['tip'],'kolicina'=>$spisak['kolicina']];
        $i++;
        }

    }



}