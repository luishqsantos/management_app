# Super Gestão - Sistema de Gestão Empresarial

## Descrição
O projeto Super Gestão é um ERP (Enterprise Resource Planning) que tem como objetivo principal o gerenciamento de estoque, produtos, fornecedores, pedidos e clientes de forma simples e objetiva. Possui uma interface de fácil compreensão para auxiliar o usuário na administração eficaz de sua empresa.

## Requisitos
- PHP 7.4.3
- Laravel 7.30.6

## Instruções

### Instalação
Siga estas etapas para instalar e configurar o Super Gestão em seu ambiente de desenvolvimento:

1. Clone o repositório:

```shell
$ git clone https://github.com/luishqsantos/management_app
```
2. Navegue até o diretório do projeto:

```shell
cd management_app
```
3. Instale as dependências do PHP com o Composer:

```shell
composer install
```
4. Crie um arquivo de ambiente `.env` e configure-o com suas informações de banco de dados e outras configurações:

```shell
cp .env.example .env
```
Preencha as informações no arquivo `.env`.

5. Gere a chave de criptografia do aplicativo:

```shell
php artisan key:generate
```
6. Execute as migrations do banco de dados:

```shell
php artisan migrate
```
7. Execute esta seeder para criação de uma credencial de login padrão:

```shell
php artisan db:seed --class=UserSeeder

email: admin@teste.com
senha: admin
```
8. Para popular as tabelas do banco de dados execute as seeders:

```shell
php artisan db:seed
```
7. Inicie o servidor de desenvolvimento:

```shell
php artisan serve
```
8. Acesse o aplicativo em [http://localhost:8000](http://localhost:8000).

### Uso
Após a instalação, faça login no sistema usando as credenciais padrão ou crie uma nova conta de administrador. Você pode começar a gerenciar estoque, produtos, fornecedores, pedidos e clientes de forma eficaz usando a interface amigável.

### Contribuição
Se você deseja contribuir para o projeto Super Gestão, siga estas etapas:
1. Faça um fork do projeto.
2. Crie uma nova branch com a sua funcionalidade: `git checkout -b minha-funcionalidade`
3. Commit suas alterações: `git commit -m 'Adicionei uma nova funcionalidade'`
4. Envie as alterações para o seu fork: `git push origin minha-funcionalidade`
5. Envie um pull request.

## Licença
Este projeto está sob a Licença MIT - consulte o arquivo [LICENSE.md](LICENSE.md) para obter detalhes.

## Créditos
Este projeto utiliza as seguintes bibliotecas e recursos:
- AdminKit v3.3.0
- Bootstrap v5.3
- Bootstrap Icons
- Croppie Js
- Font Awesome 4.7.0
- Chart js
- Node.js

## Contato
Para dúvidas, feedback ou informações adicionais, entre em contato conosco em [luis_hsjunior@outlook.com](mailto:luis_hsjunior@outlook.com).