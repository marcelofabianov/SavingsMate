#!/bin/bash
# -------------------------------------------------------------------------------------------------- #
cp _docker/local/.env.example .env && \
cp _docker/local/.env.testing . && \
cp _docker/local/docker-compose.yml . && \
cp _docker/local/alias.sh . && \
# -------------------------------------------------------------------------------------------------- #
docker compose up -d && \
docker compose exec app composer install && \
docker exec -it app php src/main.php
# -------------------------------------------------------------------------------------------------- #