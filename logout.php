<?php
ob_start();
session_start();
header("location: login-admin.php");
session_destroy();
?>