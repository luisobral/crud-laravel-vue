<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Instalação e configuração
Para realizar a instalação deste repositório, faça os seguintes passos em seu terminal:

Clone o repositório em uma pasta  
```
git clone https://github.com/luisobral/crud-laravel-vue.git
```

Instale as dependência utilizando o Composer dentro do pasta do projeto  
```
cd laravel-vue-crud
php composer.phar install
```

Faça uma cópia do arquivo de configuração  
```
cp -R .env.example .env
```

Gere uma chave para a sua aplicação  
```
php artisan key:generate
```

Por padrão, nós utilizamos SQLite como base de dados.  
Caso você deseje continuar utilizando o SQLite, não se esqueça de criar o arquivo em database/database.sqlite  
```
touch database/database.sqlite
```

## Iniciando a aplicação
Você pode iniciar a aplicação através do comando:  
```
php artisan serve
```

Após isso abrir um novo terminal de comando e digitar o seguinte comando:
```
npm install && npm run dev
```

## Rotas API
Todas as Rotas da API estão datas no arquivo route na raiz do projeto

