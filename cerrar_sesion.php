<?php
session_start();
session_destroy();
echo "
<script>alert('Sesion cerrada correctamente');location.replace('index.php');javascript:window.close();</script>";
?>