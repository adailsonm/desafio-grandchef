# Teste em PHP GrandChef

## Configuração do Projeto:

- Esse desafio foi feito usando docker então siga as orientações a seguir:

Para executar os containers do projeto
```
docker-compose up -d
```
Posterior a isso criar alias para usar artisan e compose dentro do container para não ter
necessidade de instalar os itens na maquina local:

```
alias artisan="docker-compose exec app php artisan"
alias composer="docker exec app composer"
```

Após isso rodar os seguintes comandos

```
composer install
```

Lembrando que todos os comandos listados devem ser executado dentro da pasta do projeto.

Usar .env abaixo

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:hjnjIUdfrCTC/CHY2O/WsAT0TdYBdazgJERVZfnM7+0=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=grandchef
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

JWT_SECRET=RjnpnmqcAAvqkg6ACi0Z7jWBUfJZ5mw9OJbPRPqVJH3FElFBL8dotRdbcu0pDyEP
```