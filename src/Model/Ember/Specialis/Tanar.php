<?php

namespace App\Model\Ember\Specialis;

use App\Model\Ember\Ember;
use Exception;

class Tanar extends Ember
{
    public function __construct(
        string $nev, 
        string $nem, 
        int $szuletesiEv, 
        private string $csaladiAllapot
    ) {
        $this->isEmberValid($nev, $nem, $szuletesiEv);
        $this->isCsaladiAllapotValid($nev, $csaladiAllapot);
    }

    private function isCsaladiAllapotValid($nev, $csaladiAllapot)
    {
        try {
            if ($csaladiAllapot != "házas" && $csaladiAllapot != "egyedülálló") {
                throw new Exception("A tanárnak nem megengedett családi állapota van. Megengedett: házas, egyedülálló. Kapott: " . $csaladiAllapot . ".");
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
            $this->isEmberValid($this->nev, $this->nem, $this->szuletesiEv)
            || $this->isCsaladiAllapotValid($this->nev, $this->csaladiAllapot)
        ) {
            return false;
        }

        return true;
    }
}