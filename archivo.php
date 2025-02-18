<?php
$dir = __DIR__;

// Abrir el directorio
if ($handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
        // Verificar si el archivo tiene extensión .zip
        if (pathinfo($file, PATHINFO_EXTENSION) === 'zip') {
            $zipPath = $dir . DIRECTORY_SEPARATOR . $file;
            
            // Abrir el archivo ZIP
            $zip = new ZipArchive;
            if ($zip->open($zipPath) === TRUE) {
                $zip->extractTo($dir);
                $zip->close();
                echo "Extraído: $file en $dir\n";
            } else {
                echo "Error al abrir: $file\n";
            }
        }
    }
    closedir($handle);
} else {
    echo "No se pudo abrir el directorio";
}

/*
#crea una carpeta por cada archivo zip encontrado y ahi extrae los archivos
$dir = __DIR__;

# Abrir el directorio
if ($handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
        // Verificar si el archivo tiene extensión .zip
        if (pathinfo($file, PATHINFO_EXTENSION) === 'zip') {
            $zipPath = $dir . DIRECTORY_SEPARATOR . $file;
            $extractPath = $dir . DIRECTORY_SEPARATOR . pathinfo($file, PATHINFO_FILENAME);
            
            // Crear el directorio de extracción si no existe
            if (!is_dir($extractPath)) {
                mkdir($extractPath, 0777, true);
            }
            
            // Abrir el archivo ZIP
            $zip = new ZipArchive;
            if ($zip->open($zipPath) === TRUE) {
                $zip->extractTo($extractPath);
                $zip->close();
                echo "Extraído: $file en $extractPath\n";
            } else {
                echo "Error al abrir: $file\n";
            }
        }
    }
    closedir($handle);
} else {
    echo "No se pudo abrir el directorio";
}
    */
?>
