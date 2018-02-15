<?php
ob_start();
session_start();
header("location: index.php");
session_destroy();
?>