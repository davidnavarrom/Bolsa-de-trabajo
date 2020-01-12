1. Clonar proyecto repositorio GitHub

   

2. Comprobar permisos de escritura

   ```
   sudo chmod -R 755 storage
   ```

3. Acceder al directorio del proyecto:

   

4. Instalar dependencias proyecto 

   ```
   $ composer install
   ```

   

5. Crear Base de datos desde MYSQL

   ```
   $ CREATE DATABASE tu_base_de_datos;
   ```

6. Modificar archivo .env

   ```
   PHP
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
