
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<?php
//Ucitavamoo composer AutoLoad, trenutno svaka klasa ima namespace app
require ('vendor/autoload.php');

$apoteka=new App\Apoteka();
$petShop=new App\PetShop();
$market=new App\Market();
$Prodavnica=new App\Prodavnica($apoteka);

//Simuliramo input polja i kroz niz unosimo spisak namirnica
$spisakZaMilosa=[
    ['tip'=>'sirup','kolicina'=>12],
    ['tip'=>'lek','kolicina'=>5],


];
$milos=new App\Kupac('Milos',1100,$spisakZaMilosa);
$kupovina=new App\Kupovina($Prodavnica,$milos);
$kupovina->kupi();
echo $milos->novac=$kupovina->kupac->novac;

?>
<!--Prikaz racuna jedne kupovine-->
<table class="table">
    <thead>
    <tr>
        <th>Kupac: <?php echo $kupovina->kupac->ime ?></th>
        <th>Tip Robe</th>
        <th>Kolicina</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <?php foreach ($kupovina->racun as $racun){ ?>
    <tr>
        <td></td>
        <td><?php echo $racun['tip'] ?></td>
        <td><?php echo $racun['kolicina'] ?></td>
    </tr>
  <?php } ?>
    <tr><td>Iznos racuna : <?php echo $kupovina->iznosRacuna ?></td></tr>
    </tbody>
</table>
