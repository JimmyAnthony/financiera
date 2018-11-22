<?php
session_start();
//si pasaron 10 minutos o más
session_destroy(); // destruyo la sesión
unset($_SESSION["id_usuario"]);
echo "XIM19880102";

?>