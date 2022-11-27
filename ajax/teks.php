<?php

include_once "../kamus.php";
require_once "function.php";
$sample = array_slice($kamus,0,10);
$sample = lowerArray($sample);
$sample = cekKataArray($sample);

?>

<?php foreach($sample as $k => $v) : ?>
    <span class="kata kata<?=$k ?>"><?=$v ?></span>
    <span>&nbsp;</span>
<?php endforeach; ?>