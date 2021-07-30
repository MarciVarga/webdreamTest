<?php

namespace App\Model\Ember\Specialis;

use App\Model\Ember\Ember;
use Exception;

class Tanulo extends Ember
{
    public function __construct(
        string $nev, 
        string $nem, 
        int $szuletesiEv, 
        private string $tagozat, 
        private array $erdemjegyek = []
    ) {
        $this->isEmberValid($nev, $nem, $szuletesiEv);
        $this->isErdemjegyekValid($nev, $erdemjegyek);

        $this->nev = $nev;
        $this->nem = $nem;
        $this->szuletesiEv = $szuletesiEv;
    }

    public function getTagozat(): string
    {
        return $this->tagozat;
    }

    public function setTagozat($tagozat)
    {
        $this->tagozat = $tagozat;
    }

    public function getErdemjegyek(): array
    {
        return $this->erdemjegyek;
    }

    public function getAtlag(): float
    {
        if (!empty($this->erdemjegyek)) {
            $atlag = (float)(array_sum($this->erdemjegyek) / count($this->erdemjegyek));

            return $atlag;
        }

        return 0.0;
    }

    public function kiirAtlag()
    {
        if (!$this->isErdemjegyekValid($this->nev, $this->erdemjegyek)) {
            echo "Hibásak az érdemjegyek.<br>";
        } else if ($this->getAtlag() == 0.0) {
            echo "Átlag: - <br>";
        } else {
            echo "Átlag: " . round($this->getAtlag(), 2) . "<br>";
        }
    }

    public function kiirAdatok()
    {
        if (!$this->isValid()) {
            echo "Hibás a tanuló.<br>";
        }

        echo "<b>" . $this->nev . " adatai:</b>"
             . "<br>"
             . "Nem: " . $this->nem
             . "<br>"
             . "Születési év: " . $this->szuletesiEv
             . "<br>"
             . "Tagozat: " . $this->tagozat
             . "<br>"
             . "Érdemjegyek: " . implode(", ", $this->erdemjegyek)
             . "<br>";

    }

    public function isErdemjegyekValid(
        $nev,
        $erdemjegyek,
        $uzenet = "A tanuló érdemjegyei tartalmaz nem megengedett számot. Megengedettek: 1, 2, 3, 4 es 5."
    ) {
        try {
            if (!empty($erdemjegyek)) {
                if (min($erdemjegyek) < 1 || max($erdemjegyek) > 5) {
                    throw new Exception($uzenet);
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage() . " <b>(" . $nev . ")</b><br>";

            return false;
        }

        return true;
    }

    public function isValid(): bool
    {
        if (
            !$this->isEmberValid($this->nev, $this->nem, $this->szuletesiEv)
            || !$this->isErdemjegyekValid($this->nev, $this->erdemjegyek)
        ) {
            return false;
        }

        return true;
    }
}