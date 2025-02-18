@echo off
setlocal enabledelayedexpansion

:: Obtener el directorio actual
set "dir=%CD%"

:: Recorrer los archivos ZIP en el directorio

for %%F in ("%dir%\*.zip") do (
    echo Extrayendo %%F...
    powershell -command "Expand-Archive -LiteralPath '%%F' -DestinationPath '%dir%' -Force"
)

echo Proceso completado.
pause
