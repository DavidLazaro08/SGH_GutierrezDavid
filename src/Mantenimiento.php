<?php
declare(strict_types=1);

// Clase que representa una tarea de mantenimiento o limpieza del hotel.
class Mantenimiento {

    // Propiedades de la clase Mantenimiento
    private int $id;
    private int $id_habitacion;
    private string $descripcion;
    private string $fecha_inicio;
    private string $fecha_fin;

// --------------------------------------------------------------------

    // Constructor para poder crear un mantenimiento con sus datos
    public function __construct(int $id_habitacion, string $descripcion, string $fecha_inicio, string $fecha_fin) {
        $this->id_habitacion = $id_habitacion;
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
    }

// --------------------------------------------------------------------

    // Métodos getter y setter
    public function getIdHabitacion(): int {
        return $this->id_habitacion;
    }

    public function setIdHabitacion(int $id_habitacion): void {
        $this->id_habitacion = $id_habitacion;
    }

    public function getDescripcion(): string {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void {
        $this->descripcion = $descripcion;
    }

    public function getFechaInicio(): string {
        return $this->fecha_inicio;
    }

    public function setFechaInicio(string $fecha_inicio): void {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFechaFin(): string {
        return $this->fecha_fin;
    }

    public function setFechaFin(string $fecha_fin): void {
        $this->fecha_fin = $fecha_fin;
    }

// --------------------------------------------------------------------

    // Método para obtener los mantenimientos desde nuestra base de datos
    public static function obtenerMantenimientos(): array {
        // Incluimos la conexión PDO
        require_once __DIR__ . '/../db/conexion.php';

        try {
            // Preparamos la consulta
            $consulta = $conexion->query("SELECT * FROM mantenimientos");

            // Guardamos todas las filas que devuelve la consulta
            $mantenimientos = $consulta->fetchAll(PDO::FETCH_ASSOC);

            // Devolvemos el array con todos los mantenimientos
            return $mantenimientos;

        } catch (PDOException $e) {
            // En caso de error, mostramos el mensaje
            echo "Error al obtener mantenimientos: " . $e->getMessage();
            return [];
        }
    }

}
