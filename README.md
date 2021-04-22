## Хосты:

```
127.0.0.1       laravel.test
127.0.0.1       pgadmin.laravel.test
```

## Развернуть проект:

```
cp .env.sample .env

заполнить .env

docker-compose build
docker-compose run --rm composer install
docker-compose up -d
docker-compose run --rm artisan migrate
docker-compose run --rm artisan passport:install
```

## Сгенерировать данные:

```
docker-compose run --rm composer dumpautoload
docker-compose run --rm artisan db:seed
```

## Запросы

### Логин
```
curl --location --request POST 'http://laravel.test/api/login' \
--form 'email="api@laravel.test"' \
--form 'password="secret"'
```

Получяаем токен и используем в дальнейших запросах

### Текущий пользователь
```
curl --location --request GET 'http://laravel.test/api/user' \
--header 'Authorization: Bearer {{token}}' \
```

### Получить список постов
```
curl --location --request GET 'http://laravel.test/api/posts' \
--header 'Authorization: Bearer {{token}}' \
```

### Создание поста
```
curl --location --request POST 'http://laravel.test/api/posts' \
--header 'Authorization: Bearer {{token}}' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'title=Как прекрасен этот мир, посмотри!!!!' \
--data-urlencode 'content=Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
```

### Обновление поста
```
curl --location --request PUT 'http://laravel.test/api/posts/1/' \
--header 'Authorization: Bearer {{token}}' \
--header 'Content-Type: application/x-www-form-urlencoded' \
--data-urlencode 'title=Как прекрасен этот мир, посмотри!' \
--data-urlencode 'content=Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
```

### Лайк за пост
```
curl --location --request POST 'http://laravel.test/api/posts/2/like' \
--header 'Authorization: Bearer {{token}}' \
```
