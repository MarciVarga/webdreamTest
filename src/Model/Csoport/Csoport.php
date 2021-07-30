<?php

namespace App\Model\Csoport;

use App\Model\Ember\Specialis\Tanar;
use App\Model\Ember\Specialis\Tanulo;
use Stringable;

class Csoport implements Stringable
{
    public function __construct(private Tanar $vezeto, private array $diakok = []) {}

    public function getVezeto(): Tanar
    {
        return $this->vezeto;
    }

    public function getDiakok(): array
    {
        return $this->diakok;
    }

    public function kiirCsoportAtlag()
    {
        $csoportAtlag = 0.0;
        $osszeg = 0;
        $darab = 0;

        foreach ($this->diakok as $diak) {
            if (!$diak->isErdemjegyekValid($diak->getNev(), $diak->getErdemjegyek())) {
                echo $diak->getNev() . "átlagát nem lehet számolni, mert hibásan vannak megadva a jegyek.<br>";

                continue;
            } else if ($diak->getAtlag() == 0.0){
                continue;
            } else {
                $darab++;
                $osszeg = $osszeg + $diak->getAtlag();
            }
        }

        $csoportAtlag = (float)($osszeg / $darab);

        echo "<b>Csoport átlaga: </b>" . round($csoportAtlag, 2) . "<br>";
    }

    public function __toString(): string
    {
        $nevsor = [];

        foreach ($this->diakok as $diak) {
            array_push($nevsor, $diak->getNev());
        }

        return "<b>Diákok:</b> " . implode(", ", $nevsor) . "<br>";
    }
}