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
?>
