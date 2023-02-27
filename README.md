INSTRUCCIONES EJECUCION PROYECTO EN ENTORNO LOCAL
1.	Instalar el servidor de apache a su preferencia (Wampserver o XAMPP), este debe incluir el PHP (Como mínimo 8.0) y el MySQL
2.	Instalar el composer
3.	Instalar node.js
4.	Crear la base de datos “proyecto” con el usuario root y sin contraseña en MySQL
5.	Ubicar el proyecto en la carpeta raíz de los proyectos de su servidor apache, para este caso en Wampserver debe ser en la carpeta www => C:\wamp64\www\
6.	Ingresar por cmd o por la consola de git bash a la ruta del proyecto => C:\wamp64\www\proyecto y ejecutar el comando php artisan migrate –seed
7.	En la misma consola ejecutar el comando php artisan serve
8.	En otra consola paralela con la misma ruta del proyecto => C:\wamp64\www\proyecto ejecutar el comando php artisan queue:work
9.	Ingresar a la url http://127.0.0.1:8000/


Repositorio Github: https://github.com/JulianaBobadilla/proyecto
Tablero Trello: https://trello.com/invite/b/fNMYT228/ATTI270ed61b7659602ddd335cbd2fd1c87597D06812/pruebalaravel
