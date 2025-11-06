# 🏨 SGH_GutierrezDavid

Proyecto final del módulo **PHP + MySQL**, desarrollado con **Programación Orientada a Objetos (POO)** y conexión segura mediante **PDO**.  
El sistema permite la **gestión integral de un hotel**, incluyendo habitaciones, huéspedes, reservas y tareas de mantenimiento o limpieza.

---

## 🧩 Estructura del proyecto

El código está organizado por capas para mantener la separación entre lógica, datos y presentación:


/SGH_GutierrezDavid/
├── /db/ → Conexión a MySQL y script SGH_GutierrezDavid.sql
├── /src/ → Clases PHP (Habitacion, Huesped, Reserva, Mantenimiento)
├── /views/ → Formularios y vistas HTML + PHP
├── /assets/css/ → Hoja de estilos general estilos.css
├── /assets/img/ → Recursos visuales (HOTEL1.png)
└── index.php → Menú principal de navegación


---

## 🎨 Justificación del diseño

Se optó por una **estructura modular** con un menú central desde `index.php`,  
siguiendo el modelo **MVC simplificado**:

- **Modelos:** clases PHP dentro de `/src/`.  
- **Vistas:** formularios y listados dentro de `/views/`.  
- **Controlador:** lógica básica en los formularios que interactúan con la base de datos.

El diseño visual se inspira en una paleta **lavanda y blanco**,  
elegida por su sensación de **limpieza, calma y profesionalidad**, asociada al entorno hotelero.  
En la versión final se añadió un **modo oscuro**, activable mediante una **cookie de preferencia de tema**.

---

## ⚙️ Funcionalidades principales

- ✳️ Registro y listado de **huéspedes**.  
- 🏠 Alta y consulta de **habitaciones**.  
- 📅 Creación y gestión de **reservas**.  
- 🧹 Registro de **mantenimientos y limpiezas**.  
- 🔒 **Inicio de sesión** con **gestión de roles** (`admin` / `usuario`).  
- 💾 **Sesión persistente** hasta cierre manual (`Cerrar sesión`).  
- 🌙 **Cookie de preferencia de tema** (modo claro / modo oscuro).  
- ✅ Validación de formularios y manejo de errores SQL mediante excepciones.  
- 🧱 Uso de **claves foráneas** para mantener la integridad referencial.

---

## 🧠 Justificación técnica

El proyecto se diseñó siguiendo buenas prácticas vistas en clase:

- Uso de **tipado estricto (`declare(strict_types=1)`)** en las clases.  
- Acceso seguro a la base de datos con **PDO**, `prepare()` y `bindParam()`.  
- **Separación de responsabilidades**: conexión (`/db`), lógica (`/src`), vistas (`/views`).  
- **Sesiones PHP** para mantener la autenticación activa.  
- **Cookies** para guardar preferencias visuales del usuario.  
- Comentarios claros y estilo de código homogéneo para facilitar su mantenimiento.

---

## 💾 Base de datos

**Nombre de la base:** `sgh_gutierrezdavid`

Incluye las tablas principales:

- `habitaciones`
- `huespedes`
- `reservas`
- `mantenimientos`
- `usuarios` *(nueva, para gestión de acceso y roles)*

Todas relacionadas mediante **claves foráneas** para garantizar coherencia entre módulos.  

**Usuarios de prueba incluidos:**

| Rol | Usuario / Email | Contraseña |
|-----|------------------|-------------|
| Administrador | admin@sgh.com / Administrador | admin123 |
| Usuario normal | user@sgh.com / UsuarioRandom | random123 |

---

## 🧁 Extras implementados

- 🌗 **Modo oscuro** con guardado automático en cookie (`modo_tema`).  
- 💬 Bloque de bienvenida dinámico con nombre y rol del usuario logueado.  
- 🖼️ Imagen ilustrativa del hotel (`HOTEL1.png`) como encabezado visual.  
- 🧭 Diseño responsive con flexbox y media queries.  
- 🎨 Estilo coherente entre vistas gracias a la hoja `estilos.css`.

---

## 🧑‍💻 Autor

**David Gutiérrez**  
Grado Superior en Desarrollo de Aplicaciones Multiplataforma (DAM)  
📍 Proyecto académico – Curso 2025
