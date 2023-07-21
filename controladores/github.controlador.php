<?php
require '../modelos/github.modelo.php';

$github = new Github();

// Inicialización de variables

$commit = $_REQUEST['commit'];
$tag = $_REQUEST['tag'];
$releaseName = $_REQUEST['nomtag'];
$releaseBody = $_REQUEST['desctag'];
$githubToken = $_REQUEST['token'];

$github->realizarPush();

$github->crearRelease($tag, $releaseName, $releaseBody, $githubToken);
header('Location: ../github?github=success');
