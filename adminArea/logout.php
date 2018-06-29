<?php
session_start();

session_destroy();

echo "<script>window.open('login.php?loggedOut=You have logged out', '_self')</script>";


?>