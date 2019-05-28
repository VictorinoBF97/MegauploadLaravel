# MegauploadLaravel
**Megaupload** es una pequeña aplicación web potenciada con Laravel basada en la **subida y recogida de archivos** 
por parte de los usuarios que hagan uso de la aplicación.
## Configuración del Stock
Para este proyecto se ha utilizado como entorno de desarrollo la herramienta [Laravel Valet](https://laravel.com/docs/5.8/valet) (disponible en OS X y Linux). 
Si usas Windows se puede recurrir a [Homestead](https://laravel.com/docs/5.8/homestead) a algún otro software de instalación del stack de desarrollo.
## Instalación del proyecto
Una vez instalado el stack de desarrollo, clonar el repositorio:
~~~
git clone https://github.com/VictorinoBF97/MegauploadLaravel.git
~~~
Entrar el el directorio e instalar todas las dependencias del Backend:
~~~
composer install
~~~
Crear en el servidor **MySql** una base de datos con nombre **'megauploaddb'** (sin las comillas). Asimismo configurar un usuario (nombre y contraseña) 
con permisos suficiente de acceso a dicha base de datos.

Renombrar el archivo **.env.example** a **.env** cumplimentando los datos de acceso al SGBD:
~~~
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ibdb
DB_USERNAME=usuario_mysql
DB_PASSWORD=password_mysql
~~~
Generar la clave de cifrado:
~~~
php artisan key:generate
~~~
Lanzar las migraciones cargando de datos la base de datos con los seeds:
~~~
php artisan migrate --seed
~~~
Llegados a este punto la aplicación ya debe funcionar y ser operativa desde la url [http://megaupload.test](http://megaupload.test/) (si se ha utilizado **Laravel Valet**).
