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

---

## ⚙️ Funcionalidades principales

- ✳️ Registro y listado de **huéspedes**.  
- 🏠 Alta y consulta de **habitaciones**.  
- 📅 Creación y gestión de **reservas**.  
- 🧹 Registro de **mantenimientos y limpiezas**.  
- 🔒 Conexión segura mediante **PDO** con manejo de excepciones.  
- ✅ Validación básica de formularios y control de errores.  
- 🧱 Uso de **claves foráneas** para mantener la integridad referencial.

---

## 🧠 Justificación técnica

El proyecto se diseñó siguiendo buenas prácticas vistas en clase:
- Uso de **tipado estricto (`declare(strict_types=1)`)** para evitar errores de tipo.  
- Acceso seguro a base de datos con **`prepare()`** y **`bindParam()`** (cuando aplica).  
- **Comentarios naturales y explicativos** en cada clase y script.  
- Código estructurado para facilitar su ampliación futura (por ejemplo, incorporar un login o roles).

---

## 💾 Base de datos

Nombre de la base: `sgh_gutierrezdavid`  
Incluye las tablas:

- `habitaciones`
- `huespedes`
- `reservas`
- `mantenimientos`

Todas relacionadas mediante **claves foráneas** para garantizar coherencia entre módulos.

---

## 🧑‍💻 Autor
**David Gutiérrez**  
Grado Superior en Desarrollo de Aplicaciones Multiplataforma (DAM)  
📍 Proyecto académico – Curso 2025

---