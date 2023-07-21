<?php
require '../modelos/github.modelo.php';

$github = new Github();

// Inicialización de variables

$commit = $_REQUEST['commit'];
$tag = $_REQUEST['tag'];
$releaseName = $_REQUEST['nomtag'];
$releaseBody = $_REQUEST['desctag'];
$githubToken = $_REQUEST['token'];

print_r($github->realizarPush());
print_r("<br>");
print_r($github->crearRelease($tag, $releaseName, $releaseBody, $githubToken));
exit;
header('Location: ../github?github=success');
