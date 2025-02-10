Documentação Rápida - API de Cadastro de Usuários

Requisitos

PHP 8+

Composer

MySQL ou outro banco de dados compatível

Laravel 11+

Instalação

Clone o repositório do projeto:

git clone <URL_DO_REPOSITORIO>

cd <NOME_DO_PROJETO>

Instale as dependências do projeto:

composer install

Copie o arquivo de configuração do ambiente:

cp .env.example .env

Configure o .env, definindo os valores para conexão com o banco de dados:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=nome_do_banco

DB_USERNAME=usuario

DB_PASSWORD=senha

Execute as migrações do banco de dados:

php artisan migrate

Inicie o servidor local:

php artisan serve

Documentação da API

A documentação completa da API está disponível no Postman:
https://documenter.getpostman.com/view/9577460/2sAYX9mfRC

Testando a API

Você pode testar os endpoints utilizando o Postman ou qualquer outra ferramenta de requisições HTTP.
