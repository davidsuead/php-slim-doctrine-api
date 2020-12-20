# API RestFul usando PHP + Slim + Doctrine 

Trata-se de um projeto de uma API RestFul construínda com Slim Framework (PHP) e Doctrine (MySQL).
A API do projeto consome serviços do <a href="https://docs.thecatapi.com/">TheCatApi</a> e adiciona sobre o endpoint uma camada de autenticação com JWT.
A API possui basicamente três endpoints: <b>/login</b>, <b>/refresh-token</b> e <b>/breeds</b>. A rota <strong>/breeds</strong> consome o endpoint https://api.thecatapi.com/v1/breeds/search, que retorna uma lista de raças de gato pelo nome da raça.

## Requirements
* Apache
* Git
* PHP 7
* MySQL

## Getting Started
1. ```git clone https://github.com/davidsuead/php-slim-doctrine-api.git```
2. Antes de inicializar o apache configurar httpd-vhosts.conf do apache, conforme descrição abaixo:
<br>Obs.: Adicionar o link no arquivo hosts do sistema operacional.
```
<VirtualHost *:80>
	DocumentRoot "pasta_do_projeto/public"
	ServerName api.local.slim.com.br
	<Directory "pasta_do_projeto/public">
		DirectoryIndex index.php
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```

3. Após a configuração do apache, criar um usuário, senha e um banco de dados no MySQL;
4. Alterar o nome do arquivo database.json.example => database.json, e adicionar os dados do passo 3;
5. Alterar o nome do arquivo doctrine.example.php => doctrine.example, e adicionar os dados do passo 3;
6. O projeto usa a funcionalidade <strong>migrations</strong> do Doctrine, então para inicializar o banco de dados precisa executar as seguintes comandos:
* ```./vendor/bin/doctrine-migrations migrations:execute App\Migrations\Version20201220123949 --up``` (Cria a tabela <strong>user</strong> e adiciona um registro na tabela)
* ```./vendor/bin/doctrine-migrations migrations:execute App\Migrations\Version20201220124425 --up``` (Cria a tabela <strong>token</strong>)
* ```./vendor/bin/doctrine-migrations migrations:execute App\Migrations\Version20201220124639 --up``` (Cria a tabela <strong>breed</strong> e adiciona um registro na tabela)
7. Para acessar a documentação swagger, acessar http://api.local.slim.com.br/api/ui
8. Para realizar testes na aplicação, executar na linha de comando:
* ```./vendor/bin/phpunit tests```
