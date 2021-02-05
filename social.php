<?php
header('Content-Type: image/png');
$im = imagecreate(1080, 1080);
$im = imagecreatefrompng("vaccinator_logo.png");
// Couleurs
//$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);
// Le texte à écrire
$text = "Chiffre du 01/02/2021";
//$font = 'Arial.ttf';
// Ajouter le texte
//imagettftext($im, 30, 0, 10, 70, $white, $font, $text);
imagepng($im);
//imagedestroy($im);
echo $im;
?>
