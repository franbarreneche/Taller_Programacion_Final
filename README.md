<p align="center">PROYECTO FINAL</a></p>

<p align="center">
<a href="https://upso.edu.ar">Taller de Programación</a> -
<a href="https://upso.edu.ar">UPSO</a>
</p>

## Acerca del proyecto

Aplicación web que permite mantener una lista de películas "para ver" por parte de los usuarios realizada como proyecto final para la cátedra "Taller de Programación" durante el mes de 2020.

- Permite operaciones CRUD de películas a través de una interface web.
- Permite que otros sistemas realicen consultas a través de los endpoints de una pequeña API.
- Se provee documentación al respecto generada con Postman.

La tecnología utilizada (por requerimiento) en el proyecto es el framework Laravel en PHP.

## Pasos a seguir para ejecutarlo
1. Clonar el proyecto
2. Instalar PHP, Composer y las dependencias que estos requieran.
3. Dentro del a carpeta del proyecto ejecutar el comando: `composer install`
4. Renombrar el archivo ".env.example" a sólo ".env" y modificar la configuración del mismo de acuerdo al entorno que esté usando (principalmente lo relacionado con la BD)
5. Dentro del a carpeta del proyecto ejecutar el comando: `php artisan storage:link`
6. Dentro del a carpeta del proyecto ejecutar el comando: `php artisan migrate --seed`
7. FInalmente, arrancar el server con el comando: `php artisan serve`

## CREDENCIALES
El seeder de la base de datos agrega dos usuarios por defecto, con las siguientes credenciales de acceso:
| Email | Contraseña |
| ----------- | ----------- |
| fran@gmail.com | password |
| david@gmail.com | password |