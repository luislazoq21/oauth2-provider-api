# OAuth2 Provider API (Servidor de Autorización con Laravel Passport)

Este proyecto está diseñado como un entorno de aprendizaje y práctica para dominar el protocolo **OAuth2** y la integración de **Laravel Passport** en aplicaciones empresariales.

---

## 🎯 ¿De qué trata este proyecto?

El objetivo principal de este desarrollo es construir una **API Proveedora de Identidad (Identity Provider / Authorization Server)**. A diferencia de una API convencional de consumo interno, esta aplicación está diseñada para:

1.  **Autorizar a Terceros:** Permitir que aplicaciones cliente externas (SPAs, apps móviles o servidores de terceros) soliciten acceso seguro a los recursos de los usuarios en su nombre.
2.  **Validación Descentralizada:** Emitir tokens **JWT (JSON Web Tokens)** firmados criptográficamente con claves asimétricas (pública y privada). Esto permite que otros microservicios de la red verifiquen la validez de los tokens de forma independiente, sin necesidad de consultar la base de datos principal de este servidor.
3.  **Control de Acceso Fino (Scopes):** Restringir los accesos y acciones permitidos a través de ámbitos específicos (scopes), protegiendo la integridad y privacidad de la información.

---

## 🛠️ Tecnologías y Herramientas

*   **Framework:** Laravel
*   **Seguridad y OAuth2:** Laravel Passport (OAuth 2.0 Server)
*   **Tokens:** JWT (JSON Web Tokens) firmados con claves asimétricas RSA
*   **Base de datos:** Relacional (MySQL / PostgreSQL / SQLite)

---

## 🚀 Cómo Empezar

Para poner en marcha el servidor de autorización localmente, sigue estos pasos esenciales:

1.  **Instalar dependencias de PHP:**
    ```bash
    composer install
    ```
2.  **Configurar el archivo de entorno:**
    Copia el archivo `.env.example` como `.env` y configura la base de datos.
    ```bash
    cp .env.example .env
    ```
3.  **Generar la clave de la aplicación:**
    ```bash
    php artisan key:generate
    ```
4.  **Ejecutar migraciones y Passport:**
    Ejecuta las migraciones de base de datos y genera las claves de encriptación de Passport.
    ```bash
    php artisan migrate
    php artisan passport:install
    ```
5.  **Iniciar el servidor local:**
    ```bash
    php artisan serve
    ```