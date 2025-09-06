[!["Buy Me A Coffee"](https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png)](https://www.buymeacoffee.com/dnavarrom)

<h1>PROYECTO LARAVEL - BOLSA DE TRABAJO</h1>

Este proyecto es una aplicación web cuyo objetivo consiste en ofrecer a los alumnos del instituto la posibilidad de inscribirse a múltiples ofertas de trabajo mediante la presentación de candidaturas para aumentar la probabilidad de acceder a un puesto del mercado laboral.



<h1>RESUMEN DE FUNCIONALIDAD</h1>

La plataforma muestra ofertas de trabajo que son gestionadas por un administrador. Este administrador puede crear/editar/borrar tantas ofertas de trabajo como necesite.
Los usuarios deben registrarse en la plataforma para adquirir el rol de candidato y posteriormente poder presentar candidaturas en las ofertas de trabajo que serán evaluadas por un administrador.
Una vez el administrador consulta las candidaturas de una oferta de trabajo, puede aceptar o rechazar las candidaturas de los usuarios.



<h1>CAPTURAS DE PANTALLA</h1>

![frontend](https://github.com/davidnavarrom/bolsadetrabajo/blob/master/public/img/frontend.png)

![administracion](https://github.com/davidnavarrom/bolsadetrabajo/blob/master/public/img/administracion.png)

![candidatura](https://github.com/davidnavarrom/bolsadetrabajo/blob/master/public/img/candidatura.png)

![ficha](https://github.com/davidnavarrom/bolsadetrabajo/blob/master/public/img/ficha.png)

![paneladministracion](https://github.com/davidnavarrom/bolsadetrabajo/blob/master/public/img/paneladministracion.png)

![rolusuario](https://github.com/davidnavarrom/bolsadetrabajo/blob/master/public/img/rolusuario.png)



<h1>MANUAL INSTALACIÓN</h1>

1. Clonar proyecto repositorio GitHub

   

2. Comprobar permisos de escritura

   ```
   chmod -R 755 
   ```

3. Configurar VirtualHost:

   XAMPP

   a) Editar D:\xampp\apache\conf\extra\httpd-vhosts y añadir lo siguiente:

       ```
       <VirtualHost *:80>
        DocumentRoot "D:\xampp\htdocs"
        ServerName localhost
       </VirtualHost>
    
       <VirtualHost *:80>
        DocumentRoot "D:/xampp/htdocs/bolsadetrabajo-master/public"
        ServerName bolsadetrabajo.com
        </VirtualHost>
       ```

   b) Editar  C:\Windows\System32\drivers\etc\hosts

       ```
       127.0.0.1 localhost
       127.0.0.1 bolsadetrabajo.com
       ```

   c) reiniciar XAMPP
   
4. Acceder al directorio del proyecto e Instalar dependencias proyecto 

   ```
   $ composer install
   ```

   

5. Crear Base de datos desde MYSQL

   Atención, si tu versión MYSQL es inferior a la versión 5.7.7 deberás ir a App/Providers/AppServiceProvider y descomentar la linea 33
   Cotejamiento: utf8mb4

   ```
   $ CREATE DATABASE tu_base_de_datos;
   ```

6. Copiar archivo .env-example y renombar a .env y modificar las siguientes lineas

   ```
   DB_HOST=localhost
   DB_DATABASE=tu_base_de_datos
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. Generar API KEY:

   ```
   php artisan key:generate
   ```

8. Generar base de datos desde Laravel

   ```
   php artisan migrate 
   ```

   En caso de querer rellenarla con datos predefinidos:

   ```
   php artisan migrate  --seed
   ```

9. Compilar Assets

   ```
   npm install 
   
   npm run dev/production
   ```
   
10. Abrir navegador y acceder a bolsadetrabajo.com
