# Desafio Laravel - Gerenciamento de URLs

Este é um projeto laravel, que tem como desafio a implementação de um sistema de gerenciamento de URLs em que há um processo daemon realizando requisições das URLs coletando informações das requisições.

## Instalação

### Requisitos
- docker
- curl

É importante que a porta 80 esteja liberada, pois por padrão o sail utiliza o docker para rodar nesta porta. Para a instalação siga os comandos abaixo:

```sh
curl -s https://laravel.build/example-app | bash
cd example-app
./vendor/bin/sail up -d
./vendor/bin/sail composer require leonardobav/widepaylaravelsistema1challenge-module
./vendor/bin/sail artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
./vendor/bin/sail artisan module:enable
./vendor/bin/sail artisan queue:table
./vendor/bin/sail artisan migrate
mv Modules/Widepaylaravelsistema1challenge/Routes/web_replace.php routes/web.php
./vendor/bin/sail rodar npm lá no pacote n sei como vamos fazer o teste
```

- Descrição do que cada comando realiza
    - 1- Download da versão limpa do Laravel
    - 2- Entrar na pasta raiz do projeto
    - 3- Inicializar os containers pelo  Laravel Sail
    - 4- Instalar o projeto do desafio via composer
    - 5- Ativar modulo do projeto
    - 6- Crias as migrations para o armazenamento das Jobs
    - 7- Subir com a estrutura do banco de dados


### Processos Daemon

Abra dois terminais e para cada um vá para a pasta raiz do projeto e executo os seguintes comandos um para cada um:
```sh
./vendor/bin/sail artisan queue:work --queue=requests
./vendor/bin/sail artisan queue:work --queue=urls
```


#### Teste
```sh
http://localhost
```

### Observações
Este projeto é um pacote larável que pode ser instalado também utilizando o camando:
```sh
composer require leonardobav/widepaylaravelsistema1challenge-module
```

- Pacotes Utilizados:
    - nwidart/laravel-modules": "^8.2",
    - joshbrw/laravel-module-installer": "^2.0",
    - guzzlehttp/guzzle": "^7.4",
    - laravel/fortify": "^1.8",
    - laravelcollective/html": "^6.2",
    - livewire/livewire": "^2.7"
- Projeto para gerenciamento de URLs
- Projeto desenvolvido no lubuntu versão 21.10
