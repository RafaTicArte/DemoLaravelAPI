# DemoLaravelAPI

Servidor API REST de demostración desarrollado con el framework Laravel v12 (PHP).

## Uso

### Iniciar sesión y obtener token

`POST /api/login`

### Cerrar sesión

`GET /api/logout`

### Obtener datos de usuario

`GET /api/user`

### Obtener libros paginados

`GET /api/v1/books?page=2`

### Obtener libros filtrados y paginas

`GET /api/v1/books?filter=-title&page=2`

### Obtener un libro

`GET /api/v1/books/:id`

### Crear libro

`POST /api/v1/books`

### Actualizar libro

`PUT /api/v1/books/:id`

### Eliminar libro

`DELETE /api/v1/books/:id`

## Instalación

1. Copia `.env.example` como `.env`.

2. Crea la base de datos SQLite (que será un archivo vacío, puedes utilizar los siguientes comandos ya sea desde Linux o desde Windows):

    ```shell
    touch database/database.sqlite
    ```

    ```shell
    type nul > database/database.sqlite
    ```

3. Instala las dependencias:

    ```shell
    composer install
    ```

4. Genera la clave de aplicación (application key):

    ```shell
    php artisan key:generate
    ```

5. Ejecuta las migraciones e importaciones de la base de datos:

    ```shell
    php artisan migrate --seed
    ```

6. Inicia el servidor local:

    ```shell
    php artisan serve
    ```

7. Importa la colección para comenzar a realizar peticiones de ejemplo, recuerda crear la variable de entorno `books.token`:
    * Thunder Client (de Visual Studio Code Extension) - `rest_api_thunder_collection.json`
    * Postman - `rest_api_postman_collection.json`

## Otros comandos

1. Crea la caché de la configuración de la aplicación:

    ```shell
    php artisan route:clear
    ```

2. Limpia la caché de la aplicación:

    ```shell
    php artisan cache:clear
    ```

3. Limpia la caché de la configuración de la aplicación:

    ```shell
    php artisan config:clear
    ```

4. Limpia la caché de las rutas de la aplicación:

    ```shell
    php artisan route:clear
    ```
