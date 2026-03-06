# SEDS Web Application Documentation

## Arquitectura del Proyecto
El proyecto está siendo desarrollado utilizando una arquitectura desacoplada:
- **Backend:** Laravel (API REST) en la carpeta `loggin-app`
- **Frontend:** React (Vite) con TailwindCSS (SPA) (Pendiente de inicializar)
- **Base de Datos:** PostgreSQL

## Configuración de Base de Datos
El backend se conecta a una base de datos PostgreSQL remota.
- **Host:** 10.10.0.111
- **Puerto:** 5411
- **Base de Datos:** SEDS
- **Esquema:** public

## Sistema de Autenticación (Backend)
Se implementará el sistema de autenticación utilizando **JWT (JSON Web Tokens)** a través del paquete `tymon/jwt-auth`. Esta decisión se tomó para cumplir estrictamente con el requerimiento de no modificar la base de datos `SEDS` de ninguna manera (no agregar tablas ni columnas adicionales), permitiendo mantener la arquitectura totalmente desacoplada sin dependencias de infraestructura intrusivas.

### Modelo de Usuario
Para la autenticación se utiliza la tabla existente `public.usuarios` en la base de datos `SEDS`. Debido a que la estructura de la tabla difiere de las convenciones por defecto de Laravel, se creará un modelo `Usuario` personalizado con las siguientes configuraciones:
- Llave primaria personalizada (`nomb_usr` de tipo `string`).
- Deshabilitación de timestamps automáticos (`created_at`, `updated_at`).
- Mapeo del campo de contraseña al campo `pwd_usr` existente en la base de datos (Nota: Las contraseñas en la base de datos están almacenadas en texto plano).
- Se conectará a través de la llave foránea `perfilid` a la tabla `public.perfiles` y `codpers` a la tabla `public.persona`.

### Rutas de API
- `POST /api/login`: Endpoint para iniciar sesión. Recibirá `nomb_usr` y `pwd_usr`. Devolverá un token JWT firmado.
- `GET /api/user`: Endpoint protegido para obtener la información del usuario autenticado enviando el Token en el Header.



---
*Este documento se actualizará a medida que se agreguen o modifiquen características en el proyecto.*
