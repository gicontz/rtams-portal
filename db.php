<?php

$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = '#07102003Carlo';
$db['db_name'] = 'caps_attendance';

foreach($db as $key => $value){ 
    define(strtoupper($key), $value);
}
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

?>
<!--PANG CONNECT SA DATABASE-->
<!--FOREACH PARA SA ASSIGN NG ANOTHER NAME SA VALUE-->