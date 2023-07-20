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

        $pushCommand = 'cd C:\xampp\htdocs\Integration_Zenodo_GitHub && git push origin master'; // Reemplaza /ruta/a/repo con la ruta a tu repositorio local
        exec($pushCommand);

    }

}
