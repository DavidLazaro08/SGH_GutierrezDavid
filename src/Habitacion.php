<?php
declare(strict_types=1);

// Clase que representa una habitación del hotel.
class Habitacion {
    
    // Propiedades de la clase Habitacion
    private int $id;
    private int $numero;
    private string $tipo;
    private float $precio_base;
    private string $estado_limpieza;

// --------------------------------------------------------------------

    // Constructor para poder crear una habitación con sus datos
    public function __construct(int $numero, string $tipo, float $precio_base, string $estado_limpieza = "Limpia") {
        $this->numero = $numero;
        $this->tipo = $tipo;
        $this->precio_base = $precio_base;
        $this->estado_limpieza = $estado_limpieza;
    }

    // --------------------------------------------------------------------

    // Métodos getter y setter
    public function getNumero(): int {
        return $this->numero;
    }

    public function setNumero(int $numero): void {
        $this->numero = $numero;
    }

    public function getTipo(): string {
        return $this->tipo;
    }

    public function setTipo(string $tipo): void {
        $this->tipo = $tipo;
    }

    public function getPrecioBase(): float {
        return $this->precio_base;
    }

    public function setPrecioBase(float $precio_base): void {
        $this->precio_base = $precio_base;
    }

    public function getEstadoLimpieza(): string {
        return $this->estado_limpieza;
    }

    public function setEstadoLimpieza(string $estado_limpieza): void {
        $this->estado_limpieza = $estado_limpieza;
    }

    // --------------------------------------------------------------------

    // Método para obtener las habitaciones desde nuestra base de datos
    public static function obtenerHabitaciones(): array {
        // Incluimos la conexión PDO
        require_once __DIR__ . '/../db/conexion.php';

        try {
            // Preparamos la consulta
            $consulta = $conexion->query("SELECT * FROM habitaciones");

            // Guardamos todas las filas que devuelve la consulta
            $habitaciones = $consulta->fetchAll(PDO::FETCH_ASSOC);

            // Devolvemos el array con todas las habitaciones
            return $habitaciones;

        } catch (PDOException $e) {
            // En caso de error, mostramos el mensaje
            echo "Error al obtener habitaciones: " . $e->getMessage();
            return [];
        }
    }

}
