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