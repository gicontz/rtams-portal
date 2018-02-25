<?php
include 'XDLINE.php';
$xdl = "XDLINE";
$xdline = new $xdl;
echo $xdline->encrypt_password($_GET['pw']);