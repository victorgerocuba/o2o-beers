# Prueba técnica para Walmeric

## 1. Stack técnologico

Hemos realizado la prueba con el siguiente stack

- Docker Compose
- Php 7.4
- Symfony 4.4
- MySql
- Nginx (aunque al final no le hemos dado utilidad)

Hemos montado todo esto en un entorno dockerizado, aunque Nginx esta 100% operativo, al final optamos por la opción de que para la busqueda de caracterisicticas por valores se realice desde consola.

## 2. Docker compose

Para ejecutar el proyecto ejecutamos el siguiente código
~~~
docker-compose build && docker-compose up -d
~~~

Podemos ver el proyecto funcionando en nuestro ordenador si tocamos el fichero hosts y hacemos que el dominio **walmeric.test** redireccione a nuestro ordenador, al poner este dominio en el navegador  veremos la página de bienvenida de Symfony.

## 3. BBDD 

El siguiente enlace nos lleva a un diagrama que representa la estructura de la BBDD:

https://dbdiagram.io/d/5e29659c9e76504e0ef0926c

## 4. Cargando datos de pruebas

Tenemos unos **fixtures** para jugar un poco con la aplicación, se cargan de la siguiente forma.

~~~ bash
winpty docker exec -it php-fpm  bash

# when we are inside container we execute this and accept to purge the database
php /app/bin/console doctrine:fixtures:load

~~~

## 5. Buscando personas por características

Para buscar personas a través del valor de las características estando dentro del contenedor ejecutamos el siguiente código.

~~~ bash

# where _value_ is the value to find
php /app/bin/console app:search-person value

~~~

## 6. Tests

Desarrollamos algunos tests para confirmar la integración del repositorio con la bbdd, se pueden ejecutar de la siguiente forma.

~~~ bash

cd /app
php bin/phpunit

~~~
