# Chat em Tempo Real com Laravel Reverb

Este projeto é um chat em tempo real desenvolvido utilizando Laravel Reverb.

## Pré-requisitos

- PHP versão 8.2 ou superior
- Composer
- Node.js versão 20 ou superior
- MySQL versão 5.7 ou superior

## Instalação

1. Clone o repositório do projeto:

```bash
git clone https://github.com/seu-usuario/seu-projeto.git
```

2. Instale as dependências do projeto usando o Composer:

```bash
composer install
```

3. Gere a chave do aplicativo Laravel:

```bash
php artisan key:generate
```

4. Configure o arquivo .env com as informações do banco de dados.
   
5. Execute as migrações do banco de dados:

```bash
php artisan migrate:fresh
```

6. Otimizar a aplicação para produção:

```bash
php artisan optimize
```

7. Instale as dependências JavaScript:

```bash
npm install
```

8. Compile os assets JavaScript:

```bash
npm run build
```

## Uso

Para visualizar o projeto, execute os seguintes comandos:

1. Inicie o servidor de desenvolvimento:

```bash
npm run dev
```
2. Inicie o servidor Laravel Reverb:

```bash
php artisan reverb:start
```

3. Inicie o ouvinte de filas:
```bash
php artisan queue:listen
```

4.Inicie o servidor PHP:
```bash
php artisan serve
```

## Contribuição
Contribuições são bem-vindas! Abra uma issue ou envie um pull request para sugerir melhorias, correções de bugs, etc.



