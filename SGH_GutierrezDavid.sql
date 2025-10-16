
-- Creación de la base de datos SGH_GutierrezDavid.
-- Empleé IF NOT EXISTS para evitar errores si la base ya existía, tal y como se ha visto en clase.
-- Además, añadí las opciones DEFAULT CHARACTER SET y COLLATE para definir la codificación "UTF-8 moderna"
-- y garantizar una correcta interpretación de caracteres especiales y acentos, ampliando lo visto
-- en los ejemplos teóricos pero intentando mantener la misma estructura base.

CREATE DATABASE IF NOT EXISTS sgh_gutierrezdavid
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;

-- Seleccionamos nuestra base creada
USE sgh_gutierrezdavid;

-- -------------------------------------------------------------
-- TABLA: habitaciones
-- Contiene la info básica de cada habitación del hotel según se nos pide.
-- Incluye número identificativo, tipo, precio base y estado de limpieza.
-- -------------------------------------------------------------

CREATE TABLE IF NOT EXISTS habitaciones (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  numero INT UNSIGNED NOT NULL UNIQUE,
  tipo ENUM('Sencilla', 'Doble', 'Suite') NOT NULL,
  precio_base DECIMAL(10,2) NOT NULL,
  estado_limpieza ENUM('Limpia', 'Sucia', 'En_Limpieza') NOT NULL DEFAULT 'Limpia',
  fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Notas:
-- Puse UNSIGNED en los números porque no tiene sentido que haya valores negativos.
-- La fecha se guarda sola con TIMESTAMP, así sé cuándo se creó cada registro.
-- Dejé InnoDB y utf8mb4 como vienen por defecto, pues vi que son las opciones "recomendadas" y evitan problemas con acentos o relaciones.

-- -------------------------------------------------------------
-- TABLA: huespedes
-- Guarda los datos de cada huésped: nombre, email y documento de identidad.
-- El email se define como único para evitar registros duplicados.
-- -------------------------------------------------------------

CREATE TABLE IF NOT EXISTS huespedes (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  documento_identidad VARCHAR(50) NOT NULL,
  fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Notas:
-- Se añadió UNIQUE en el email para que no se repita.
-- Se guarda automáticamente la fecha de registro con TIMESTAMP.

-- -------------------------------------------------------------
-- TABLA: reservas
-- Registra las reservas de huéspedes en habitaciones para un rango de fechas.
-- Incluye precio total y estado (Pendiente, Confirmada, Cancelada).
-- -------------------------------------------------------------

CREATE TABLE IF NOT EXISTS reservas (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_huesped INT UNSIGNED NOT NULL,
  id_habitacion INT UNSIGNED NOT NULL,
  fecha_reserva TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  fecha_llegada DATE NOT NULL,
  fecha_salida DATE NOT NULL,
  precio_total DECIMAL(10,2) NOT NULL,
  estado ENUM('Pendiente', 'Confirmada', 'Cancelada') NOT NULL DEFAULT 'Pendiente',
  FOREIGN KEY (id_huesped) REFERENCES huespedes(id) ON DELETE CASCADE,
  FOREIGN KEY (id_habitacion) REFERENCES habitaciones(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Notas:
-- Cada reserva enlaza a un huésped y a una habitación mediante claves foráneas.
-- El precio total se calculará desde la lógica PHP más adelante.
-- El estado por defecto se deja en "Pendiente".

-- -------------------------------------------------------------
-- TABLA: mantenimientos
-- Registra tareas de mantenimiento o limpieza que puedan bloquear una habitación.
-- Incluye descripción, fechas y la habitación afectada.
-- -------------------------------------------------------------

CREATE TABLE IF NOT EXISTS mantenimientos (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  id_habitacion INT UNSIGNED NOT NULL,
  descripcion VARCHAR(255) NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE NOT NULL,
  FOREIGN KEY (id_habitacion) REFERENCES habitaciones(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Notas:
-- Cada mantenimiento pertenece a una habitación.
-- Si una habitación tiene mantenimiento "activo", no se podrá reservar en esas fechas (controlamos en PHP).

-- -------------------------------------------------------------
-- PRUEBAS
-- -------------------------------------------------------------
-- INSERT INTO habitaciones (numero, tipo, precio_base, estado_limpieza)
-- VALUES (101, 'Sencilla', 45.00, 'Limpia');

-- INSERT INTO huespedes (nombre, email, documento_identidad)
-- VALUES ('Juan Pérez', 'juanperez@example.com', '12345678A');

-- INSERT INTO reservas (id_huesped, id_habitacion, fecha_llegada, fecha_salida, precio_total, estado)
-- VALUES (1, 1, '2025-10-20', '2025-10-25', 225.00, 'Confirmada');

-- SELECT * FROM habitaciones;
-- SELECT * FROM huespedes;
-- SELECT * FROM reservas;

-- -------------------------------------------------------------
-- CREO DISTINTAS HABITACIONES DIRECTAMENTE DESDE AQUÍ
-- -------------------------------------------------------------

-- Borramos habitaciones anteriores para evitar duplicados
DELETE FROM habitaciones;

INSERT INTO habitaciones (numero, tipo, precio_base, estado_limpieza) VALUES
(101, 'Sencilla', 45.00, 'Limpia'),
(102, 'Doble', 65.00, 'Sucia'),
(201, 'Suite', 120.00, 'En_Limpieza'),
(202, 'Doble', 70.00, 'Limpia');

SELECT * FROM habitaciones;

-- Comprueba primero los ids reales:
SELECT id, numero FROM habitaciones;

-- Borra mantenimientos antiguos si quieres un estado limpio
DELETE FROM mantenimientos;

-- Inserta mapeando numero -> id
INSERT INTO mantenimientos (id_habitacion, descripcion, fecha_inicio, fecha_fin)
SELECT h.id, 'Limpieza profunda tras salida de huésped', '2025-10-10', '2025-10-12'
FROM habitaciones h
WHERE h.numero = 101;

INSERT INTO mantenimientos (id_habitacion, descripcion, fecha_inicio, fecha_fin)
SELECT h.id, 'Revisión del aire acondicionado', '2025-10-13', '2025-10-15'
FROM habitaciones h
WHERE h.numero = 202;
