# DemoLaravelAPI

Servidor API REST de demostración desarrollado con el framework Laravel (PHP).

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

1. Copia `.env.example` a `.env`:

    ```shell
    cp .env.example .env
    ```

2. Crea la base de datos SQLite:

    ```shell
    touch database/database.sqlite
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

7. Importa a Postman la colección `postman_collection.json` para realizar peticiones.

## Otros comandos

1. Limpia la caché del servidor, si fuera necesario:

    ```shell
    php artisan cache:clear
    ```
