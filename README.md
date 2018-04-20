
## BuzzQuestions

Este projeto utiliza o framework laravel 5.6 e para poder "rodar" em sua máquina é necessário instalar as dependências listada a seguir.

 - COMPOSER
 - NPM
 - PHP >= 7.1.3
-   OpenSSL PHP Extension
-   PDO PHP Extension
-   Mbstring PHP Extension
-   Tokenizer PHP Extension
-   XML PHP Extension
-   Ctype PHP Extension
-   JSON PHP Extension

Para saber mais sobre o laravel: https://laravel.com/

Será necessário uso do terminal(sempre na pasta do projeto)

Obs: recomendo o uso do laragon, pois o mesmo dispõe das ferramentas(composer,nodejs,npm,entre outros...) necessárias para rodar o projeto.

### COMPOSER

Caso não tenha , será necessário instalar o composer em sua máquina.
Para saber mais como instalar: https://getcomposer.org/

Se você contêm o composer basta utilizar o seguinte comando para baixar as dependências:
```bash
composer install
```

### NPM

Será necessário instalar o nodejs para que possa se utlizar do npm.
Caso não o tenha , segue o link para compreender como obtê-lo: https://www.npmjs.com/get-npm

E será necessário rodar o seguinte comando:
```bash
npm install
```
ou
```bash
npm i
```
### CONFIGURAÇÃO DO .ENV

Como em todo projeto laravel é necessário configurar o .env ( Pois lá é onde está a configuração de banco de dados por exemplo , entre outras configurações importantes.)

Primeiramente copie o .env.example. Basta utilizar

```bash
cp .env.example .env
```
Logo após utilize

```bash
php artisan key:generate
```

Por ultimo , abra o arquivo e modifique as informações para acessar o seu banco de dados

```php
DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=nome_do_seu_banco  
DB_USERNAME=username_do_seu_mysql  
DB_PASSWORD=senha_do_seu_mysql
```
Para conferir mais sobre o arquivo de configuração : https://laravel.com/docs/5.6/configuration#environment-configuration
