<p id='paraID'>Paragraph Sports</span>
<br>
<?php
$htmlEle = "<p id='paraID'>Paragraph Sports</p>";
$domdoc = new DOMDocument();
$domdoc->loadHTML($htmlEle);
 
//echo $domdoc->getElementById('paraID')->nodeValue;
var_dump($domdoc->getElementById('paraID'));





?>


<form action="" method="get">
    <input type="text" name="buah">
    <input type="text" name="apel">
    <input type="text" name="anggur">
    <button type="submit">Kirim</button>
</form>