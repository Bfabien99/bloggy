<?php
    function generatePagination($totalItems, $itemsPerPage, $currentPage, $url)
    {
        $totalPages = ceil($totalItems / $itemsPerPage);
        
        $pagination = '<ul class="pagination">';
    
        if ($totalPages > 1) {
            if ($currentPage > 1) {
                $pagination .= '<li class="page-item"><a href="' . $url . 'page=' . ($currentPage - 1) . '" class="page-link">Previous</a></li>';
            }
    
            for ($i = 1; $i <= $totalPages; $i++) {
                if ($i == $currentPage) {
                    $pagination .= '<li class="page-item active"><a href="#" class="page-link">' . $i . '</a></li>';
                } else {
                    $pagination .= '<li class="page-item"><a href="' . $url . 'page=' . $i . '" class="page-link">' . $i . '</a></li>';
                }
            }
    
            if ($currentPage < $totalPages) {
                $pagination .= '<li class="page-item"><a href="' . $url . 'page=' . ($currentPage + 1) . '" class="page-link">Next</a></li>';
            }
        }
    
        $pagination .= '</ul>';
    
        return $pagination;
    }

    function escapeString(string $value): string
    {
        return trim(strip_tags($value));
    }

    /**
     * Method routeToCOntroller
     *
     * @param string $uri [explicite description]
     * @param array $routes [explicite description]
     *
     * @return void
     */
    function routeToCOntroller(string $uri, array $routes){
        if(array_key_exists($uri, $routes)){
            require($routes[$uri]);
        }
    }
    
    /**
     * Method uploadFile
     *
     * @param string $file [explicite description]
     *
     * @return array
     */
    function uploadFile($file): array
    {
        // var_dump($file);
        // die();
        // Répertoire de destination des fichiers uploadés
        $uploadDir = 'uploads/';
        chmod($uploadDir, 0755);
    
        // Vérification s'il y a une erreur lors de l'upload
        if ($file['error'] == UPLOAD_ERR_INI_SIZE) {
            return ['error' => "La taille du fichier dépasse 2 Mo."];
        }
        if ($file['error'] == UPLOAD_ERR_PARTIAL) {
            return ['error' => "Le fichier n'a pas pu être entierement téléchargé"];
        }
        if ($file['error'] == UPLOAD_ERR_NO_FILE) {
            return ['error' => "Le fichier n'a pas été chargé"];
        }
        if ($file['error'] == UPLOAD_ERR_CANT_WRITE) {
            return ['error' => "Impossible d'enregistré le fichier sur le disque"];
        }

        if ($file['error'] !== UPLOAD_ERR_OK) {
            return ['error' => "Erreur lors de l'upload du fichier."];
        }

        // Vérification de la taille du fichier (2 Mo)
        $maxFileSize = 2 * 1024 * 1024; // 2 Mo en octets
        if ($file['size'] > $maxFileSize) {
            return ['error' => "La taille du fichier dépasse 2 Mo."];
        }
    
        // Vérification du type de fichier
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file['type'], $allowedTypes)) {
            return ['error' => "Seuls les fichiers JPEG, PNG et GIF sont autorisés."];
        }

        // Réassigner un nom unique au fichier s'il existe déjà
        $uploadFile = $uploadDir . basename($file['name']);
        $extension = pathinfo($uploadFile, PATHINFO_EXTENSION);
        $filename = pathinfo($uploadFile, PATHINFO_FILENAME);
        $i = 1;
        $finalName = $filename .'.'. $extension;
        while (file_exists($uploadFile)) {
            $uploadFile = $uploadDir . $filename . '_' . $i . '.' . $extension;
            $finalName = $filename . '_' . $i . '.' . $extension;
            $i++;
        }
    
        // Déplacement du fichier vers le répertoire de destination
        if (!move_uploaded_file($file['tmp_name'], $uploadFile)) {
            return ['error' => "Erreur lors du déplacement du fichier."];
        }
    
        return ['success' => "Fichier uploadé avec succès.", 'name' => $finalName];
    }
        
    /**
     * Method resizeImage
     *
     * @param string $filePath [explicite description]
     *
     * @return array
     */
    function resizeImage(string $filePath): array 
    {
        $uploadDir = 'uploads/';
        chmod($uploadDir, 0755);
        // Vérification de la taille de l'image
        list($width, $height) = getimagesize($filePath);
    
        // Redimensionnement de l'image
        $image = imagecreatefromjpeg($filePath); // Modifier la fonction selon le type d'image
        $newWidth = 800;
        $newHeight = 800;
        $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
        // Sauvegarde de l'image redimensionnée avec une qualité de 90%
        $resizedFileName = $uploadDir . basename($filePath);
        imagejpeg($resizedImage, $resizedFileName, 90); // Changer le pourcentage de qualité si nécessaire
    
        // Libération de la mémoire
        imagedestroy($image);
        imagedestroy($resizedImage);
        return ['success' => "Fichier redimensionné avec succès.", 'name' => $resizedFileName];
    }
    
    