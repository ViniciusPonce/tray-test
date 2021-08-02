
# Tray-Test
PHP Programmer Test
=======
<p align="center"><img src="https://mktmais.com.br/wp-content/uploads/2019/09/tray-logo.jpg" width="400"></p>


## Descrições

Projeto desenvolvido em [Laravel 7](https://laravel.com/docs/8.x)

## Requisitos

* [Composer](https://getcomposer.org/)
* [PHP >= 7.4](https://www.php.net/)
* [Nodejs 10.18](https://nodejs.org/en/)
* [Docker](https://www.docker.com/) (Obrigatório)


## Instalação do Projeto Local
##### 1 - Após download, dentro da pasta do projeto renomeie o arquivo ```.env.example``` para ```.env```.  e dentro dele preencha as variáveis:

* DB_CONNECTION=mysql 
* DB_HOST=mysql
* DB_PORT=3306
* DB_DATABASE=tray
* DB_USERNAME=root
* DB_PASSWORD=root
####
* MAIL_MAILER=smtp
* MAIL_HOST=smtp.mailtrap.io
* MAIL_PORT=2525
* MAIL_USERNAME=d3bef8443639a4 (configurar parametros do mailtrap para teste)
* MAIL_PASSWORD=c00c6f9ccc211c (configurar parametros do mailtrap para teste)
* MAIL_ENCRYPTION=tls
* MAIL_FROM_ADDRESS=mail_teste@tray.net.br (Pode ser qualquer email, somente para teste no mailtrap)

##### 2 - Execute os comandos abaixo:
* ```composer install```
* ```npm install```
* ```npm run dev```
* ```docker-compose up -d```
* ```docker-compose exec php-fpm bash php artisan key:generate```
* ```docker-compose exec php-fpm bash php artisan migrate``` 
####Para ativar o cron (rotina) de disparo de email confirada para 21:00Hrs de acordo com a hora do servidor, basta executar o comando abaixo:
* ```docker-compose exec php-fpm bash service cron start```
#####
* Para consultar a hora do servidor:  ```docker-compose exec php-fpm bash date```


##### 3 - Se houver a necessidade, alterar as a variavel ```ports:``` dentro do arquivo docker-compose.yml referente ao container utilizado:

* ##### webserver:
#### ou
* #### mysql: (caso for alterado a porta da imagem mysql, alterar tambem as variveis do arquivo ```.env```, citadas acima)

* Caso seja testa em SO Linux, poderá pedir permissão na pasta 
#### ```sudo chmod 777 -R storage/```
