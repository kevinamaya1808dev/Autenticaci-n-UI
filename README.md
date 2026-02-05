# 🚀 Laravel 12 Auth & RBAC Boilerplate (Machote Pro)

Este es un **machote** (plantilla base) avanzado para proyectos de Laravel 12. No solo incluye autenticación, sino también un sistema completo de **Control de Acceso Basado en Roles (RBAC)** y gestión de usuarios, diseñado para acelerar el desarrollo de aplicaciones empresariales.

## ✨ Características Principales
- **Laravel 12.x**: Núcleo actualizado a la última versión.
- **Autenticación Completa**: Login, Registro y Password Reset vía `laravel/ui`.
- **Gestión de Usuarios (CRUD)**: Módulo administrativo para crear, editar, listar y eliminar usuarios.
- **Roles y Permisos**: Integración profesional con **Spatie Laravel-Permission**.
- **Interfaz Dinámica**:
  - Menú de navegación que se adapta según el rol del usuario.
  - Dashboard personalizado con saludos y accesos directos por rol.
  - Uso de *Badges* y alertas de Bootstrap 5 para una mejor experiencia.
- **Totalmente en Español**: Traducciones integradas en validaciones, vistas y mensajes de sistema.

## 🛠️ Requisitos de Instalación

Si deseas usar este machote para un nuevo proyecto, sigue estos pasos:

### 1. Clonar y Preparar
```bash
git clone [https://github.com/kevinamaya1808dev/Autenticaci-n-UI.git](https://github.com/kevinamaya1808dev/Autenticaci-n-UI.git) nombre-de-tu-proyecto
cd nombre-de-tu-proyecto
2. Instalar Dependencias
Bash
composer install
npm install
3. Configuración de Entorno
Copia el archivo .env, genera la clave y configura tu base de datos:

Bash
cp .env.example .env
php artisan key:generate
4. Base de Datos y Roles
Este paso es vital para que el sistema reconozca los roles de Administrador y Usuario:

Bash
php artisan migrate --seed
npm run build
5. Iniciar Aplicación
Bash
php artisan serve
🔑 Credenciales por Defecto (Seeders)
Usuario: admin@gmail.com

Password: 12345678

📂 Módulos Incluidos
Usuarios: Listado con paginación, asignación de roles y validaciones avanzadas.

Seguridad: Middleware de rutas para restringir el acceso a usuarios no autorizados.

UI/UX: Layout principal con @vite, Sass y componentes de Bootstrap 5.

Desarrollado por Kevin Amaya 


---

### ¿Cómo aplicarlo ahora mismo?

1.  Abre tu archivo `README.md` en VS Code.
2.  Borra todo lo que tiene y pega este nuevo código.
3.  Guarda el archivo.
4.  Ejecuta estos comandos en tu terminal para subirlo:

```powershell
git add README.md
git commit -m "docs: actualización final del README con módulos de usuarios y roles"
git push origin main
