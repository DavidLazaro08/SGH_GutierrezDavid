# SGH_GutierrezDavid

Proyecto final de PHP + MySQL con Programación Orientada a Objetos (POO).  
El sistema permite gestionar habitaciones, huéspedes, reservas y mantenimientos de un hotel.

## Estructura
El proyecto se divide en capas:
- **/db:** conexión PDO y script SQL.
- **/src:** clases PHP con lógica de negocio.
- **/views:** formularios y vistas HTML+PHP.
- **/assets/css:** estilos generales.

## Justificación del diseño
Se optó por una estructura modular con un menú principal en `index.php`.  
Cada módulo se gestiona en su propia vista para favorecer la claridad, el mantenimiento y la coherencia visual.  
El estilo sigue una paleta lavanda que transmite profesionalidad y calma, acorde a un entorno hotelero.

## Funcionalidades
- Registro de huéspedes.
- Creación y listado de reservas.
- Gestión de habitaciones y mantenimientos.
- Control de integridad con claves foráneas y PDO.

