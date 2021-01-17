# Laravel Leaderboard API

## To configure and setup this project. Please follow below steps:

- Open Terminal/Command Prompt and go to your project directory.

- Run `composer update` to install all project dependency if anything is missing.

- Copy `.env` file from `.env.example`.

- Setup `mysql` database `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD`.

- Migrate the database using command `php artisan migrate`.

- Seed the database using command `php artisan db:seed --class=MembersSeeder`.

- Now your project is ready to serve!!

## To start/serve this project. Please follow below step:

- `php artisan serve`

You should be able to see following message:

>Starting Laravel development server: http://127.0.0.1:8000


## You can now access following API end points, which you can test using Postman or other software that support API requests.

** To Get Leaderboard Users list in Points Desc Order **

GET `http://127.0.0.1:8000/api/users`

It would return json object of particular user


** To Get Leaderboard User Info for particular user **

GET `http://127.0.0.1:8000/api/user/show/{id}` -- replace `{id}` with user id 

It would return json object of particular user


** To Add user **

POST `http://127.0.0.1:8000/api/user/add` 

Parameters to be posted in json format:
```
{
    "name":"Jon Doe",
    "age":28,
    "address":"BC, Canada"
}
```

It would return json object with message.


** To Plus the Point of particular user **

PUT `http://127.0.0.1:8000/api/user/plus` 

Parameters to be posted in json format (id of user to whom we want to increase point):
```
{
    "id":7
}
```

It would return updated json object with user list.


** To Minus the Point of particular user **

PUT `http://127.0.0.1:8000/api/user/minus` 

Parameters to be posted in json format (id of user to whom we want to decrease point):
```
{
    "id":7
}
```

It would return updated json object with user list.


** To Delete user **

DELETE `http://127.0.0.1:8000/api/user/delete/{id}` -- replace `{id}` with user id 

It would return json object with message.


## To execute test cases. Please follow below step:

- `vendor/bin/phpunit`

You should be able to see following message for successful test cases execution:
>PHPUnit 9.5.0 by Sebastian Bergmann and contributors.
>.........                                                           9 / 9 (100%)
>OK (9 tests, 26 assertions)
