@echo off
setlocal enabledelayedexpansion

echo Extracion de archivos ZIP.
echo Beta 0.1. | GNU General Public License v3.0
echo Se van a extraer todos los archivos contenidos en los archivos ZIP en el directorio actual.
pause

:: Obtener el directorio actual
set "dir=%CD%"

:: Recorrer los archivos ZIP en el directorio
for %%F in ("%dir%\*.zip") do (
    echo Extrayendo %%F...
    powershell -command "Expand-Archive -LiteralPath '%%F' -DestinationPath '%dir%' -Force"
)

echo Proceso completado.
pause
