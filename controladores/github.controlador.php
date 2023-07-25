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
$tagName = $_REQUEST['tag'];
$releaseName = $_REQUEST['nomtag'];
$releaseBody = $_REQUEST['desctag'];
$rutaRepositorioLocal = $_REQUEST['repositorio'];
$nombreDirectorio = basename($rutaRepositorioLocal);
$descripcionRepositorio = $_REQUEST['repoDescription'];

// Creación de repositorio en GIT
$rutaRepositorioRemoto = $github->crearRepositorioGitHub($nombreDirectorio, $descripcionRepositorio, $githubToken);

// Commit y push en GIT
$github->realizarPrimerPush($rutaRepositorioLocal, $nombreDirectorio, $rutaRepositorioRemoto);

// Commit y push en GIT
$github->realizarCommitPush($rutaRepositorioLocal);

// Creación de la versión release y el tag
$github->crearRelease($tagName, $releaseName, $releaseBody, $githubToken, $nombreDirectorio);

// Redireccionamiento a la vista
header('Location: ../github?github=success');
