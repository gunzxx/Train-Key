<p id='paraID'>Paragraph Sports</span>
<br>
<?php
$htmlEle = "<p id='paraID'>Paragraph Sports</p>";
$domdoc = new DOMDocument();
$domdoc->loadHTML($htmlEle);
 
//echo $domdoc->getElementById('paraID')->nodeValue;
var_dump($domdoc->getElementById('paraID'));





?>