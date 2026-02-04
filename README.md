# 🚀 Laravel Auth Boilerplate (Machote UI)

Este es un "machote" o plantilla base para proyectos de Laravel 12 que incluye un sistema de autenticación completo utilizando **Bootstrap** a través de **Laravel UI**, configurado totalmente en **español**.

## ✨ Características
- **Laravel 12.x** como núcleo del proyecto.
- **Autenticación UI:** Login, Registro y Restablecimiento de contraseña listos para usar.
- **Frontend con Bootstrap:** Estilos manejados mediante **Sass** y compilados con **Vite**.
- **Totalmente en Español:** Validaciones, correos y vistas traducidas para el mercado local.
- **Clean UI:** Vista de bienvenida simplificada y profesional.

## 🛠️ Requisitos de Instalación
Si decides clonar este machote para un nuevo proyecto, sigue estos pasos:

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/kevinamaya1808dev/Autenticaci-n-UI.git] nombre-de-tu-proyecto
   cd nombre-de-tu-proyecto

2. **Instalar dependencias de PHP y Node.js**
Bash
composer install
npm install
3. **Configurar variables de entorno**
Copia el archivo de ejemplo y genera la clave de seguridad:

Bash
cp .env.example .env
php artisan key:generate
Nota: No olvides configurar tus credenciales de base de datos en el archivo .env recién creado.

4. **Compilar Assets y Migrar**
Bash
npm run build
php artisan migrate
5. Iniciar Servidor
Bash
php artisan serve
📂 Estructura del Machote
lang/es/: Contiene todas las traducciones de validaciones y autenticación.

resources/sass/app.scss: Punto de entrada para personalizar los estilos de Bootstrap.

resources/views/auth/: Vistas de autenticación adaptadas al español.

resources/views/layouts/app.blade.php: Plantilla principal con @vite configurado para Sass.

📝 **Notas del Desarrollador**
Este proyecto sirve como base sólida para proyectos escalables, asegurando que la configuración inicial de idioma y estilos no sea una tarea repetitiva. Ideal para proyectos como sistemas POS o aplicaciones de e-commerce.

Desarrollado por Kevin Amaya


---

### ¿Cómo guardarlo ahora mismo?
Una vez que pegues esto en tu archivo y lo guardes en VS Code, ejecuta esto para que tu perfil de GitHub se vea increíble:

```powershell
git add README.md
git commit -m "docs: actualización final del README con instrucciones de uso"
git push origin main