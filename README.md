
![Escudo de la UTP](https://www.utp.edu.co/assets/img/escudos/identificadorNew.png)

# Gestión de Jueces Olímpicos
### UTP - Universidad Tecnológica de Pereira

**Docente:** Ivan Alexander Laverde

## Proyecto

Este proyecto es una aplicación CRUD (Crear, Leer, Actualizar, Eliminar) desarrollada en PHP utilizando el patrón de diseño MVC (Modelo-Vista-Controlador). Está diseñado para la gestión de jueces, personas y deportes en un contexto olímpico. El proyecto utiliza PostgreSQL como sistema de gestión de bases de datos, y ofrece una interfaz sencilla y funcional basada en Bootstrap.

## Características

- **Gestión de Jueces**: Crear, editar, eliminar y visualizar información de los jueces.
- **Gestión de Personas**: Crear, editar, eliminar y visualizar datos personales.
- **Gestión de Deportes**: Crear, editar, eliminar y gestionar información sobre deportes.
- **Interfaz Intuitiva**: Diseño responsivo basado en [Bootstrap 5.3.3](https://getbootstrap.com/).
- **Conexión con PostgreSQL**: Conexión segura y optimizada mediante PDO para PostgreSQL.
- **Arquitectura MVC**: Separación lógica de responsabilidades para un código más limpio y mantenible.

## Estructura del Proyecto

- **`config/`**: Configuración global, incluyendo credenciales de conexión a la base de datos.
- **`controllers/`**: Controladores que manejan la lógica de la aplicación y gestionan las solicitudes del usuario.
- **`models/`**: Modelos que interactúan con la base de datos y gestionan la lógica de negocios.
- **`views/`**: Vistas que generan la interfaz de usuario y muestran datos dinámicos.
- **`public/`**: Carpeta pública con el archivo `index.php` y recursos estáticos.
- **`ScriptSQL/`**: Contiene los scripts necesarios para crear la base de datos y su estructura.

## Instalación

### Requisitos Previos

- PHP 7.4 o superior con la extensión `pdo_pgsql` habilitada:
    - Edita el archivo `php.ini` y habilita la línea:
      ```ini
      extension=pdo_pgsql
      ```  
- Servidor web (por ejemplo, Apache o Nginx).
- PostgreSQL (versión 12 o superior).

### Pasos de Instalación

1. **Clonar el Repositorio**:
   ```bash
   git clone https://github.com/FelipeMogollon1/olympics.git
   cd olympics
   ```  

2. **Configurar la Base de Datos**:
    - Usa las credenciales de conexión proporcionadas para PostgreSQL:
        - Host: ``
        - Base de datos: ``
        - Usuario: ``
        - Contraseña: ``
        - Puerto: ``
        - Esquema: ``
    - Crea las tablas ejecutando el script SQL proporcionado en `ScriptSQL/olimpicos.sql`.

3. **Configurar el Proyecto**:
    - En el archivo `config/database.php`, ajusta las credenciales según sea necesario:
      ```php
      private $host = '';
      private $db_name = '';
      private $username = '';
      private $password = '';
      private $port = '';
      private $schema = '';
      ```  

4. **Configurar el Servidor Web**:
    - Configura tu servidor para que apunte al directorio `public/`.
    - Asegúrate de que `mod_rewrite` esté habilitado si usas Apache.

5. **Acceso a la Aplicación**:  
   Abre tu navegador y accede a la aplicación:
   ```bash
   http://localhost/olympics/public/
   ```  

## Uso

- **Gestión de Jueces**: Crear, editar, eliminar y listar jueces.
- **Gestión de Personas**: Gestiona información personal asociada a los jueces.
- **Gestión de Deportes**: Agregar, modificar y eliminar deportes disponibles.

## Dependencias

- **PHP**: Con extensión PDO para PostgreSQL habilitada.
- **PostgreSQL**: Sistema de gestión de bases de datos.
- **Bootstrap**: Framework CSS para el diseño de la interfaz.

## Contribuciones

Las contribuciones son bienvenidas. Sigue estos pasos:

1. Haz un **fork** del repositorio.
2. Crea una nueva rama:
   ```bash
   git checkout -b feature/nueva-funcionalidad
   ```  
3. Realiza los cambios y haz commit:
   ```bash
   git commit -m "Agregar nueva funcionalidad"
   ```  
4. Sube los cambios a tu repositorio remoto:
   ```bash
   git push origin feature/nueva-funcionalidad
   ```  
5. Abre un Pull Request para que revisemos tus cambios.

## Licencia

Este proyecto está licenciado bajo la [Licencia MIT](LICENSE).

## Contacto

Para consultas o sugerencias, puedes contactarme a través de [mi perfil de GitHub](https://github.com/tu-usuario).  
