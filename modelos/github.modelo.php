<?php

class Github
{

    function crearRepositorioGitHub($nombreDirectorio, $descripcionRepositorio, $accessToken)
    {
        //Datos del nuevo repositorio
        //$repoName = 'Prueba Crear Repositorio'; // Cambiar al nombre que desees
        //$repoDescription = 'Prueba Crear Repositorio'; // Cambiar a la descripción que desees
        $private = false; // Cambiar a true para crear un repositorio privado

        // Datos de autenticación
        //$githubUsername = 'LeoAvila1911';
        //$accessToken = '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';

        // URL de la API de GitHub para crear repositorios
        $apiUrl = 'https://api.github.com/user/repos';

        // Datos para la solicitud POST
        $data = array(
            'name' => $nombreDirectorio,
            'description' => $descripcionRepositorio,
            'private' => $private
        );

        // Convertir los datos a formato JSON
        $dataJson = json_encode($data);

        // Configurar la solicitud cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_USERAGENT, 'PHP Script');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Authorization: token ' . $accessToken
        ));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataJson);

        // Ejecutar la solicitud cURL
        $result = curl_exec($ch);

        // Verificar el resultado y cerrar la solicitud cURL
        if ($result === false) {
            echo 'Error en la solicitud cURL: ' . curl_error($ch);
        } else {
            $response = json_decode($result, true);
            if (isset($response['html_url'])) {
                echo 'Repositorio creado exitosamente. URL: ' . $response['html_url'];
            } else {
                echo 'Error al crear el repositorio. Detalles: ' . print_r($response, true);
            }
        }
        curl_close($ch);

        return $result;
    }

    public function realizarPrimerPush($rutaRepositorio, $nombreDirectorio)
    {
        // Agrega más comandos para cada carpeta que desees incluir en el push
        $commitCommands = array(
            'echo "# ' . $nombreDirectorio . '" >> README.md',
            'cd ' . $rutaRepositorio,
            'git init',
            'git add README.md',
            'git commit -m "first commit"',
            'git branch -M main',
            'git remote add origin ' . $rutaRepositorio . '.git',
            'git push -u origin main',
        );

        // Lectura de comandos 
        foreach ($commitCommands as $command) {
            exec($command);
        }
    }

    public function realizarPush($rutaRepositorio)
    {
        // Reemplaza con el mensaje del commit
        $commitMessage = 'Commit inicial';
        // Agrega más comandos para cada carpeta que desees incluir en el push
        $commitCommands = array(
            'cd ' . $rutaRepositorio . ' && git add . && git commit -m "' . $commitMessage . '"'
        );

        // Lectura de comandos 
        foreach ($commitCommands as $command) {
            exec($command);
        }

        // Push de comandos 
        $pushCommand = 'cd ' . $rutaRepositorio . ' && git push origin main';

        exec($pushCommand);
    }

    public function crearRelease($tag, $releaseName, $releaseBody, $githubToken, $nombreDirectorio)
    {
        // Datos del repositorio
        $owner = 'LeoAvila1911';
        $url = "https://api.github.com/repos/{$owner}/{$nombreDirectorio}/releases";
        $data = array(
            'tag_name' => $tag,
            'name' => $releaseName,
            'body' => $releaseBody
        );

        // Transformación a json
        $jsonData = json_encode($data);

        // Ejecución de api github
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'User-Agent: PHP cURL',
            'Authorization: token ' . $githubToken,
        ));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
