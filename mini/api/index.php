<?php

session_start();
$_SESSION = array();
session_unset();
session_destroy();
Header("location: ../index.php");
