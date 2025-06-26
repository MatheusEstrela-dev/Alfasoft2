@echo off
title Projeto Alfasoft - Starter
color 0A

echo ================================================
echo     INICIANDO PROJETO ALFASOFT COM DOCKER
echo ================================================
echo.

REM Subindo os containers
echo [1/5] Iniciando Docker...
docker compose up -d

REM Espera o container estar pronto
echo [2/5] Aguardando container subir...
timeout /t 5 /nobreak > NUL

REM Acessando o container para instalar dependências
echo [3/5] Instalando dependências...
docker compose exec app bash composer install

REM Rodando migrations e seeders
echo [4/5] Migrando banco e populando dados...
docker compose exec app bash php artisan migrate:fresh --seed

REM Limpando cache e gerando key
echo [5/5] Limpando cache e configurando app...
docker compose exec app bash php artisan config:clear
docker compose exec app bash php artisan config:cache
docker compose exec app bash php artisan key:generate

REM Abrindo no navegador
echo Abrindo no navegador...
start http://localhost:8000

echo.
echo ================================================
echo     Projeto iniciado com sucesso!
echo ================================================
pause
