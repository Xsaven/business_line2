# Install

1. Установить зависимости `composer install`
1. Сгенерировать новый файл системного окружения `.env` выполнив команду `cp .env .env.example`
1. Сгенерировать уникальный ключ приложения выполнив команду `php artisan key:generate` (Он сам пропишется в `.env`)
1. Настроить системное окружение `.env`
1. Создаём базу данных и начальные значения таблиц `php artisan migrate --seed`.
   Или обновляем базу данных и начальные значения таблиц `php artisan migrate:fresh --seed`
1. Обновляем скрипты админки `php artisan lte:install -f`
1. Настроить `Supervisor`, необходимо создать 2 конфига:
* `/etc/supervisor/conf.d/queue.conf` Для запуска очередей:
 ```cfg
[program:queue]
process_name=%(program_name)s_%(process_num)02d
command=php [path_to_script]/artisan queue:work --tries=1 --timeout=0 --memory=4000
autostart=true
autorestart=true
user=root
numprocs=12
redirect_stderr=true
stdout_logfile=[path_to_script]/worker-queue.log
```

* `/etc/supervisor/conf.d/ws.conf` Для старта `WebSoketServer`:

```cfg
[program:ws]
command=php [path_to_script]/artisan websockets:serve
autostart=true
autorestart=true
user=root
redirect_stderr=true
stdout_logfile=[path_to_script]/worker-ws.log
```

### Cron
`* * * * * cd [path_to_script] && php artisan schedule:run >> /dev/null 2>&1`
