<?php
require_once "korrikalaria.php";
class Txapelketa
{


    private $korrikalariak = [];

    public function __construct()
    {

    }

    public function korrikalariaGehitu($korrikalaria)
    {
        $this->korrikalariak[$korrikalaria->getKodea()] = $korrikalaria;
    }

    public function gehituLasterketaKorrikalariari($kodea, $denbora)
    {
        if (isset($this->korrikalariak[$kodea])) {
            $this->korrikalariak[$kodea]->lasterketaGehitu($denbora);
        }



    }
    public function batezbestekoa()
    {
        $batura = 0;
        $kopurua = 0;

        foreach ($this->korrikalariak as $korrikalaria) {

            $denborak = $korrikalaria->getLasterketaDenbora();

            if (isset($denborak[0])) {
                $batura = $batura + $denborak[0];
                $kopurua++;

            }
        }

        if ($kopurua == 0) {
            return 0;
        }
        return $batura / $kopurua;
    }

    public function korrikalariBizkorrena()
    {
        $bizkorrena = null;
        $denboraOnena = null;

        foreach ($this->korrikalariak as $korrikalaria) {
            $denborak = $korrikalaria->getLasterketaDenbora();
            if (isset($denborak[0])) {
                if ($denboraOnena == null || $denborak[0] < $denboraOnena) {
                    $denboraOnena = $denborak[0];
                    $bizkorrena = $korrikalaria;
                }
            }
        }
        return $bizkorrena;
    }

    public function hamabostBainooGehiago()
    {
        $emaitza = [];
        foreach ($this->korrikalariak as $korrikalaria) {
            $denborak = $korrikalaria->getLasterketaDenbora();
            if (isset($denborak[0]) && isset($denborak[1]) && $denborak[0] > 15 && $denborak[1] > 15) {
                $emaitza[] = $korrikalaria->getIzena();
            }
        }
        return $emaitza;
    }
    public function amaieraE()
    {
        $emaitza = [];
        foreach ($this->korrikalariak as $korrikalaria) {
            $izena = $korrikalaria->getIzena();
            if (substr($izena, -1) == "e") {
                $emaitza[] = $korrikalaria;
            }
        }
        return $emaitza;
    }
}



?>