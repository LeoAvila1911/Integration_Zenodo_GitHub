<?php
require '../modelos/github.modelo.php';
$github=new Github();

$github->realizarPush();
$github->crearRelease();
header('Location: ../ventas?github=success');
?>