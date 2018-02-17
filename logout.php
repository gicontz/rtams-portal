<?php
ob_start();
include('functions.php');
session_start();
header('location: '. $domain_header);
session_destroy();
?>