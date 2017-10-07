<?php
//MySQL connecting variables settings
    $hostname = "";
    $username = "prof_syst";
    $password = "system123!";
    $datebase = "profession";
//MySQL main connecting queries
    mysql_connect($hostname,$username,$password);
//MySQL datebase select
    mysql_select_db($datebase);
//MySQL output encoding
    $encoding = "UTF8";
    @mysql_query("set names $encoding");
?>