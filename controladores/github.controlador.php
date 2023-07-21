<?php
require '../modelos/github.modelo.php';
require '../modelos/zenodo.php';
require '../modelos/database.php';

// Instancia de clases
$github = new Github();
$zenodo = new Zenodo();


// Consulta a la base de tokens
$tabla = 'tokens';
$where = "estado = 1";
$tokens = $zenodo->obtenerTokenGit($tabla, $where);
$githubToken = $tokens['token'];
$tokenid = $tokens['id'];

$where = "id = $tokenid";
$zenodo->actualizarTokenGit($tabla, $where);

// Inicialización de variables
$commit = $_REQUEST['commit'];
$tag = $_REQUEST['tag'];
$releaseName = $_REQUEST['nomtag'];
$releaseBody = $_REQUEST['desctag'];

$github->realizarPush();

$github->crearRelease($tag, $releaseName, $releaseBody, $githubToken);
header('Location: ../github?github=success');
