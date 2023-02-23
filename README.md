This is the project to demo use path for pagination based on livewire.
### Why livewire
Because I want to change pagination without rerender layout.

### Why I need to use path for pagination
Because it is friendly to SEO.

### Use case
```
Eshop merchandise list
```


### How to use this demo
```
./vendor/bin/sail build
./vendor/bin/sail up
```
In laravel container
```
docker exec -it livewire_path_pagination-laravel-1 bash
su sail
composer install
php artisan migrate
```
