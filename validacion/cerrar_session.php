<?php
session_start();
//si pasaron 10 minutos o más
session_destroy(); // destruyo la sesión

header("Location:../index.php");
?>