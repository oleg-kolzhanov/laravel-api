## Хосты:

```
127.0.0.1       laravel.test
127.0.0.1       pgadmin.laravel.test
```

## Сгенерировать данные:

```
docker-compose run --rm composer dumpautoload

docker-compose run --rm artisan db:seed
```

## Запросы

### Получить список постов
```
curl --location --request GET 'http://laravel.test/api/posts'
```