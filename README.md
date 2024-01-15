<br/>
<div align="center">
  <img src="https://static.vecteezy.com/system/resources/thumbnails/018/930/745/small/twitter-logo-twitter-icon-transparent-free-free-png.png" width=200 align="center" />
  <h3 align="center">Clon de Twitter</h3>
  <h4 align="center">Pequeño clon de twitter, fullstack, practicando Vue3 y Laravel, utilizando MySql como base de datos</h4>

  <p align="center">
    <a href="https://macachallenge-production.up.railway.app/admin">View Demo</a>
  </p>
</div>


## Tabla de contenidos

* [Sobre el Proyecto](#sobre-el-proyecto)
  - [Screenshots](#screenshots)  
* [Stack](#stack)
* [Empezando](#empezando)
  * [Probar localmente](#probar-localmente)
* [Autores](#autores)

## Sobre el Proyecto

Proyecto realizado a modo de práctica utilizando Vue 3, Laravel 10 y MySql. Es un clon mínimo de Twitter donde de momento sólo se puede crear un tweet (ya sea solo texto, con imagen o con video) y eliminar un tweet. Tal vez má adelante le agrege más funcionalidades y así hacerlo más completo.

<br/>
<br/>



   

### Screenshots

![image](https://github.com/niicodeer/twitter-clone-vue-laravel/assets/97641886/eb6dfa42-405a-4773-af4c-8d52eda0c24f)

![image](https://github.com/niicodeer/twitter-clone-vue-laravel/assets/97641886/7d7390f1-3222-4b25-a18f-92c6fbd5af93)


<br/>

## Stack

<br/>

![Shields](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white) ![Shields](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white) 	![Shields](https://img.shields.io/badge/Vue.js-35495E?style=for-the-badge&logo=vue.js&logoColor=4FC08D) ![Shields](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)  


<br/>

## Empezando

### Probar localmente

Requisitos previos:
- Tener Xampp o Laragon installado, junto con PHP 8, Laravel y PhpMyAdmin | HeidiSql | Sql Workbench.

<br/>

Puedes correr el repositorio localmente siguiendo los siguientes pasos

1. Clone the repo

```sh
git clone https://github.com/niicodeer/twitter-clone-vue-laravel.git
```
2. Access to project's folder

```sh
cd twitter-cone-vue-laravel
```

3. Generate the .env file

```sh
cp .env.example .env
```

4. Configure your APP_KEY in the new .env file
```sh
php artisan key:generate
```

5. Configure the .env file

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 //Here put your PORT
DB_DATABASE=laravel  //Here put your database name
DB_USERNAME=root  //Here put your database username
DB_PASSWORD=  //Here put your database password
```

6. Install packages

```sh
composer install
```

```sh
npm install
```

7. Run the migrations and seeders

```sh
php artisan migrate --seed
```

8. Run the project

```sh
php artisan serve
```


<br/>
<br/>

## Autores

* **Nico Radin** - *Desarrollador Full stack* - [Nico Radin](https://github.com/niicodeer) - 

