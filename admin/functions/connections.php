<?php


define("HOST" , "localhost");
define("USER" , "root");
define("PASSWORD" , "");
define("DB_NAME" , "plus");


$connection = new mysqli(HOST , USER , PASSWORD , DB_NAME);

$connection ->set_charset("utf8");
