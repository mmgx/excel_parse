## Установка локального окружения
- docker-compose -p parse -f docker/docker-compose.yml up
- копировать .env.example в .env
- docker exec -it parse_fpm bash
- composer install
- art telescope:install
- art migrate

