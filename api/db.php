<?php

function getPdo()
{

    $bdd = new PDO('mysql:host=xd3r5.myd.infomaniak.com;dbname=xd3r5_coralie', "xd3r5_coralie", "1GVNINLyRSQq");
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    return $bdd;
}
