<h1>Manual instalación proyecto</h1>

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
