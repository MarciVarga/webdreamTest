<?php

use App\Model\Ember\Specialis\Tanulo;
use App\Model\Ember\Specialis\Tanar;
use App\Model\Csoport\Csoport;

require_once realpath("vendor/autoload.php");

//Elso csoport
echo "<b>Első csoport: </b>";
echo "<br>";

$tanuloEgy = new Tanulo("Marci", "F", 1998, "Informatika", [3, 1, 3, 4, 2]);
$tanuloEgy->kiirAdatok();
$tanuloEgy->kiirAtlag();

$tanuloKetto = new Tanulo("Réka", "N", 2000, "Informatika", [2, 3, 2, 1]);
$tanuloKetto->kiirAdatok();
$tanuloKetto->kiirAtlag();

$tanarEgy = new Tanar("Eszter", "N", 1977, "egyedülálló");

$csoportEgy = new Csoport($tanarEgy, [$tanuloEgy, $tanuloKetto]);
$csoportEgy->kiirCsoportAtlag();
echo $csoportEgy;

//Masodik csoport
echo "<br>";
echo "<b>Második csoport: </b>";
echo "<br>";

$tanuloHarom = new Tanulo("Dezső", "F", 2002, "Matek", [5, 5, 5, 2, 1]);
$tanuloHarom->kiirAdatok();
$tanuloHarom->kiirAtlag();

$tanuloNegy = new Tanulo("Ferenc", "F", 1994, "Matek", [2, 1, 2, 1, 1]);
$tanuloNegy->kiirAdatok();
$tanuloNegy->kiirAtlag();

$tanarKetto = new Tanar("Emőke", "N", 1969, "házas");

$csoportKetto = new Csoport($tanarKetto, [$tanuloHarom, $tanuloNegy]);
$csoportKetto->kiirCsoportAtlag();
echo $csoportKetto;

//Harmadik csoport
echo "<br>";
echo "<b>Harmadik csoport: </b>";
echo "<br>";

$tanuloOt = new Tanulo("Miklós", "F", 1997, "Angol", [2, 4, 5, 2, 3]);
$tanuloOt->kiirAdatok();
$tanuloOt->kiirAtlag();

$tanuloHat = new Tanulo("Viktória", "N", 1999, "Angol", [5, 5, 5, 5, 4]);
$tanuloHat->kiirAdatok();
$tanuloHat->kiirAtlag();

$tanuloHet = new Tanulo("Anett", "N", 1998, "Angol", [3, 4, 3, 4]);
$tanuloHet->kiirAdatok();
$tanuloHet->kiirAtlag();

$tanuloNyolc = new Tanulo("Zsombor", "F", 1999, "Angol", [4, 4, 5, 2, 2]);
$tanuloNyolc->kiirAdatok();
$tanuloNyolc->kiirAtlag();

$tanarHarom = new Tanar("Ernő", "F", 1982, "házas");

$csoportHarom = new Csoport($tanarHarom, [$tanuloOt, $tanuloHat, $tanuloHet, $tanuloNyolc]);
$csoportHarom->kiirCsoportAtlag();
echo $csoportHarom;