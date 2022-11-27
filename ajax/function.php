<?php

include "../kamus.php";
// include "../kamus.php";


function lowerArray(array $kamus){
    $dump = [];
    foreach($kamus as $k)
    {
        strtolower($k);
        array_push($dump,$k);
    }
    return $dump;
}


function cekKataArray(array $smpl)
{
    global $abjad;
    $dumpText = [];
    foreach($smpl as $v)
    {
        $dump = [];
        $huruf = str_split($v);
        foreach($huruf as $h){
            if(in_array($h, $abjad)){
                array_push($dump,$h);
            }
            else{
                continue;
            }
        }
        $kata = implode("",$dump);
        array_push($dumpText,$kata);
    }
    return $dumpText;
}

?>