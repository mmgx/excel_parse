## Установка локального окружения
- docker-compose -p parse -f docker/docker-compose.yml up
- копировать .env.example в .env
- docker exec -it parse_fpm bash
- composer install
- art telescope:install
- art migrate
- art webpush:vapid

- вызов sweetalert через event и broadcast - например с использованием команды в tinker на добавление записи в таблицу:
 $row = new App\Models\Row(); $row->name = 'Test name'; $row->date = '2022-01-10'; $row->save()
