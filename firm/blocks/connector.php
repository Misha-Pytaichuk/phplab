<?php
    $host     = '127.0.0.1';
    $db       = 'firmadogovor';
    $user     = 'root';
    $password = '';
    $port     = 3306;
    $charset  = 'utf8mb4';


    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connect = mysqli_connect($host, $user, $password, $db, $port);
    $connect->set_charset($charset);
    $connect->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
