#!/bin/bash
docker exec php sh -c 'chown -R www-data /var/www/html/arquivos'
docker exec php sh -c 'chown -R www-data /var/www/html/artistas'