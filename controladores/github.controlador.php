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

// Inicialización de variables
$commit = $_REQUEST['commit'];
$tag = $_REQUEST['tag'];
$releaseName = $_REQUEST['nomtag'];
$releaseBody = $_REQUEST['desctag'];
$githubToken = $prueba['token'];

header('Location: ../github?github=success');
