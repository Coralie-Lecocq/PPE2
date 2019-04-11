<?php

function getPdo()
{

    $vcap_services = json_decode($_ENV['VCAP_SERVICES'], true);
    $uri = $vcap_services['compose-for-mysql'][0]['credentials']['uri'];
    $db_creds = parse_url($uri);
    $dbname = "xd3r5_coralie";

    $dsn = "mysql:host=" . $db_creds['host'] . ";port=" . $db_creds['port'] . ";dbname=" . $dbname;
    $dbh = new PDO($dsn, $db_creds['user'], $db_creds['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    return $dbh;
}
