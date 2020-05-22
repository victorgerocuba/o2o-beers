# Prueba técnica para O2O

## 1. Stack técnologico

Hemos realizado la prueba con el siguiente stack

- Docker Compose
- Php 7.4
- Symfony 5
- Nginx (se puede ver en el localhost 127.0.0.1:8080)


## 2. Docker compose

Para ejecutar el proyecto ejecutamos el siguiente código
~~~
docker-compose build && docker-compose up -d
~~~

Podemos ver el proyecto funcionando en nuestro ordenador si tocamos el fichero hosts y hacemos que el dominio **o2o.test:8080** o **127.0.0.1:8080** redireccione a nuestro ordenador, al poner este dominio en el navegador  veremos la página de bienvenida de Symfony.

## 3. Métodos disponibles

#### 3.1 Buscar por comida
Para buscar cervezas por comida se puede realizar en la url

~~~ 
# food => de no encontrarse se devolveran todas las cervezas
https://o2o.test/api/v1/beer?food=[palabra por la que queremos buscar]
~~~

#### 3.2 Obtener una cerveza específica

Con este endpoint obtenemos una cerveza específica

~~~ 
https://o2o.test/api/v1/beer/{beer_id}
~~~

