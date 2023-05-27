#!/bin/sh
docker compose -f docker-compose-localdb.yml up -d
DBHOST="localhost" php -S localhost:8080 -t src