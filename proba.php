
<?php

require_once "korrikalaria.php";
require_once "txapelketa.php";

$txapelketa = new Txapelketa();

$k1 = new Korrikalaria("Ane", "A01");
$k2 = new Korrikalaria("Jon", "B02");
$k3 = new Korrikalaria("Mikel", "C03");
$k4 = new Korrikalaria("Leire", "D04");

$txapelketa->korrikalariaGehitu($k1);
$txapelketa->korrikalariaGehitu($k2);
$txapelketa->korrikalariaGehitu($k3);
$txapelketa->korrikalariaGehitu($k4);

$txapelketa->gehituLasterketaKorrikalariari("A01", 12);
$txapelketa->gehituLasterketaKorrikalariari("A01", 18);

$txapelketa->gehituLasterketaKorrikalariari("B02", 20);
$txapelketa->gehituLasterketaKorrikalariari("B02", 17);

$txapelketa->gehituLasterketaKorrikalariari("C03", 8);
$txapelketa->gehituLasterketaKorrikalariari("C03", 14);

$txapelketa->gehituLasterketaKorrikalariari("D04", 16);
$txapelketa->gehituLasterketaKorrikalariari("D04", 19);

echo "1. lasterketako batez bestekoa: ";
echo $txapelketa->batezbestekoa();
echo " segundo";

echo "<br><br>";

$bizkorrena = $txapelketa->korrikalariBizkorrena();

echo "Korrikalari bizkorrena: ";
echo $bizkorrena->getIzena();

echo "<br><br>";

echo "Bi lasterketetan 15 segundo baino gehiago egin dituztenak:<br>";

$emaitza = $txapelketa->hamabostBainooGehiago();

foreach ($emaitza as $izena) {
    echo $izena . "<br>";
}

echo "<br>";

echo "'e' letrarekin amaitzen diren korrikalariak:<br>";

$emaitza = $txapelketa->amaieraE();

foreach ($emaitza as $korrikalaria) {
    echo $korrikalaria->getIzena() . "<br>";
}

echo "<br>";

try {
    $txapelketa->gehituLasterketaKorrikalariari("A01", 4);
} catch (Exception $e) {
    echo "SALBUESPENA: " . $e->getMessage();
}

?>

