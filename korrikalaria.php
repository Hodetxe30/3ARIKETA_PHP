<?php

class Korrikalaria
{
    private $izena;
    private $kodea;
    private $lasterketaDenbora = [];
    private $lasterketaKopurua;

    public function __construct($izena, $kodea)
    {
        $this->izena = $izena;
        $this->kodea = $kodea;
        $this->lasterketaKopurua = 0;
    }

    public function getIzena()
    {
        return $this->izena;
    }
    public function setIzena($izena)
    {
        $this->izena = $izena;
    }
    public function getKodea()
    {
        return $this->kodea;
    }
    public function setKodea($kodea)
    {
        $this->kodea = $kodea;
    }
    public function getLasterketaDenbora()
    {
        return $this->lasterketaDenbora;
    }
    public function setLasterketaDenbora($lasterketaDenbora)
    {
        $this->lasterketaDenbora[] = $lasterketaDenbora;
    }
    public function getLasterketaKopurua()
    {
        return $this->lasterketaKopurua;
    }
    public function setLasterketaKopurua($lasterketaKopurua)
    {
        $this->lasterketaKopurua = $lasterketaKopurua;
    }

    public function lasterketaGehitu($denbora)
    {



        if ($denbora < 5) {
            throw new Exception("Lasterketa denbora 5 segundo baino gutxiagokoa da");
        }
        if ($this->lasterketaKopurua >= 5) {
            throw new Exception("Korrikalariak iada 5 lasterketa egin ditu, ezin du 5 lasterketa baino gehiagota parte hartu.");

        }

        $this->lasterketaDenbora[] = $denbora;
        $this->lasterketaKopurua++;

    }
}

?>