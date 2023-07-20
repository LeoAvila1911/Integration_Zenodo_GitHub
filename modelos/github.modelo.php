<?php

class Github
{
    public function realizarPush()
    {
        $repoOwner = 'LeoAvila1911'; // Reemplaza con el nombre del propietario del repositorio
        $repoName = 'Integration_Zenodo_GitHub'; // Reemplaza con el nombre de tu repositorio
        $commitMessage = 'prueba 0.1.1'; // Reemplaza con el mensaje del commit
        $githubToken = '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'; // Reemplaza con tu token de acceso personal de GitHub

        $commitCommands = array(
            'cd C:\xampp\htdocs\Integration_Zenodo_GitHub && git add . && git commit -m "' . $commitMessage . '"',
            // Agrega más comandos para cada carpeta que desees incluir en el push
        );

        foreach ($commitCommands as $command) {
            exec($command);
        }

        $pushCommand = 'cd C:\xampp\htdocs\Integration_Zenodo_GitHub && git push origin main'; // Reemplaza /ruta/a/repo con la ruta a tu repositorio local
        exec($pushCommand);

    }

    public function crearRelease()
    {
        $owner = 'LeoAvila1911'; // Reemplaza con el nombre del propietario del repositorio
        $repo = 'Integration_Zenodo_GitHub'; // Reemplaza con el nombre de tu repositorio
        $tag = 'v2.0.0'; // Reemplaza con la etiqueta (tag) del release
        $releaseName = 'Release 2.0.0'; // Reemplaza con el nombre del release
        $releaseBody = 'Prueba Release 2.0.0'; // Reemplaza con la descripción del release
        $githubToken = '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'; // Reemplaza con tu token de acceso personal de GitHub

        $url = "https://api.github.com/repos/{$owner}/{$repo}/releases";

        $data = array(
            'tag_name' => $tag,
            'name' => $releaseName,
            'body' => $releaseBody);

        $jsonData = json_encode($data);

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
/* print_r($response);
exit; */
        if ($response) {
            echo 'Release creado exitosamente.';
        } else {
            echo 'Error al crear el release.';
        }

    }

}
