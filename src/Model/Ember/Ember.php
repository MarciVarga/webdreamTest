<?php

namespace App\Model\Ember;

use Exception;

abstract class Ember
{
    protected string $nev;
    protected string $nem;
    protected int $szuletesiEv;

    public function getNev(): string
    {
        return $this->nev;
    }

    public function getNem(): string
    {
        return $this->nem;
    }

    public function getSzuletesiEv(): int
    {
        return $this->szuletesiEv;
    }

    abstract public function isValid(): bool;

    protected function isEmberValid($nev, $nem, $szuletesiEv)
    {
        try {
            if ($nem != "F" && $nem != "N") {
                throw new Exception("Rossz nem lett beállitva. Elvárt: F/N. Kapott: " . $nem . ".");
            }

            if ($szuletesiEv > date("Y")) {
                throw new Exception("Az ember meg sem születhetett még. Elvárt: max. " . date("Y") . ". Kapott: " . $szuletesiEv . ".");
            }
        } catch (Exception $e) {
            echo $e->getMessage() . " <b>(" . $nev . ")</b><br>";

            return false;
        }

        return true;
    }
}