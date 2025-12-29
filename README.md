# UV Energía Solar ☀️

Sistema web para UV Energía Solar, empresa de energía solar fotovoltaica en Argentina.

## 📋 Descripción

UV Energía Solar es una plataforma web completa desarrollada con arquitectura MVC personalizada en PHP. El sistema permite a los usuarios calcular su potencial de ahorro con energía solar, explorar productos, consultar proyectos realizados y contactar con la empresa.

## ✨ Características

- **Calculadora Solar Interactiva**: Herramienta para calcular el ahorro potencial con paneles solares
- **Catálogo de Productos**: Visualización de productos de energía solar disponibles
- **Galería de Proyectos**: Muestra de proyectos realizados
- **Sección Educativa**: Información sobre energía solar y sus beneficios
- **Formulario de Contacto**: Sistema de contacto directo
- **Panel de Administración**: Gestión de contenidos y usuarios
- **Diseño Responsivo**: Optimizado para todos los dispositivos

## 🛠️ Tecnologías Utilizadas

- **Backend**: PHP 7.4+
- **Base de Datos**: MySQL/MariaDB
- **Frontend**: HTML5, CSS3, JavaScript
- **Estilos**: TailwindCSS 4.1.0
- **Arquitectura**: MVC Personalizado
- **Servidor Web**: Apache (compatible con .htaccess)

## 📂 Estructura del Proyecto

```
uvenergiasolar/
├── Assets/              # Recursos estáticos (CSS, JS, imágenes)
├── Config/              # Archivos de configuración
│   └── Config.php       # Configuración de base de datos y constantes
├── Controllers/         # Controladores MVC
│   ├── Home.php
│   ├── Producto.php
│   ├── Calcular.php
│   ├── Contacto.php
│   ├── Admin.php
│   └── ...
├── Models/              # Modelos de datos
│   ├── ProductoModel.php
│   ├── ProyectosModel.php
│   ├── UsuariosModel.php
│   └── homeModel.php
├── Views/               # Vistas del sistema
│   ├── home.php
│   ├── productos.php
│   └── ...
├── Libraries/           # Librerías del core
│   └── Core/
│       ├── Autoload.php
│       └── Load.php
├── Helpers/             # Funciones auxiliares
│   └── Helpers.php
├── index.php            # Punto de entrada principal
├── .htaccess            # Configuración de Apache
└── proyecto_energia.sql # Schema de base de datos
```

## 🚀 Instalación

### Requisitos Previos

- PHP 7.4 o superior
- MySQL 5.7+ o MariaDB 10.3+
- Apache con mod_rewrite activado
- Composer (opcional, para gestión de dependencias)
- Node.js y npm (para compilar TailwindCSS)

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/tony2688/uvenergiasolar.git
   cd uvenergiasolar
   ```

2. **Configurar la base de datos**
   
   Importar el archivo SQL:
   ```bash
   mysql -u tu_usuario -p nombre_base_datos < proyecto_energia.sql
   ```

3. **Configurar el archivo Config.php**
   
   Editar `Config/Config.php` con tus credenciales:
   ```php
   const BASE_URL = "http://tu-dominio.com/";
   const DB_HOST = "localhost";
   const DB_NAME = "nombre_bd";
   const DB_USER = "usuario_bd";
   const DB_PASSWORD = "contraseña_bd";
   ```

4. **Configurar permisos**
   ```bash
   chmod 755 Assets/
   chmod 644 Config/Config.php
   ```

5. **Instalar dependencias de frontend (opcional)**
   ```bash
   npm install
   ```

6. **Configurar Apache**
   
   Asegúrate de que `mod_rewrite` esté habilitado y que el archivo `.htaccess` esté en la raíz del proyecto.

7. **Acceder al sitio**
   
   Abre tu navegador y ve a `http://tu-dominio.com/`

## 🗄️ Base de Datos

El proyecto incluye el archivo `proyecto_energia.sql` con la estructura completa de la base de datos. Las tablas principales incluyen:

- **usuarios**: Gestión de usuarios del sistema
- **productos**: Catálogo de productos solares
- **proyectos**: Proyectos realizados
- **contactos**: Mensajes de contacto

## 🔧 Configuración

### URL Amigables

El proyecto utiliza `.htaccess` para URLs amigables. El patrón es:
```
http://tu-dominio.com/controlador/metodo/parametros
```

Ejemplos:
- `/home/home` - Página principal
- `/producto/ver/1` - Ver producto con ID 1
- `/calcular/index` - Calculadora solar
- `/contacto/enviar` - Formulario de contacto

### Variables de Configuración

En `Config/Config.php` puedes configurar:
- `BASE_URL`: URL base del sitio
- Credenciales de base de datos
- Zona horaria (configurada para Argentina/Tucumán)
- Formato de moneda (ARS)
- Separadores decimales

## 👥 Uso

### Acceso Público

Los visitantes pueden:
- Usar la calculadora solar
- Ver el catálogo de productos
- Consultar proyectos realizados
- Enviar mensajes de contacto
- Leer información sobre energía solar

### Panel de Administración

Para acceder al panel de administración:
1. Ir a `/admin/login`
2. Ingresar credenciales de administrador
3. Gestionar productos, proyectos y usuarios

## 🌐 Despliegue en Producción

El sitio está actualmente desplegado en:
**https://www.uvenergiasolar.com.ar/**

Para desplegar en producción:
1. Desactivar `display_errors` en `Config/Config.php`
2. Configurar certificado SSL
3. Optimizar recursos estáticos
4. Configurar backups de base de datos
5. Implementar caché si es necesario

## 📝 Notas Importantes

- El proyecto incluye configuración para zona horaria de Argentina (Tucumán)
- La moneda está configurada en pesos argentinos (ARS)
- El sitio está optimizado para SEO y rendimiento
- Se recomienda usar HTTPS en producción

## 🤝 Contribuciones

Si deseas contribuir al proyecto:
1. Haz un Fork del repositorio
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto es propiedad de UV Energía Solar.

## 📧 Contacto

**UV Energía Solar**
- Sitio Web: https://www.uvenergiasolar.com.ar/
- GitHub: [@tony2688](https://github.com/tony2688)

---

Desarrollado con ☀️ para un futuro más sustentable
