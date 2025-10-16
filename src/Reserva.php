<?php
declare(strict_types=1);

// Clase que representa una reserva dentro del hotel.
class Reserva {

    // Propiedades de la clase Reserva
    private int $id;
    private int $id_huesped;
    private int $id_habitacion;
    private string $fecha_llegada;
    private string $fecha_salida;
    private float $precio_total;
    private string $estado;

// --------------------------------------------------------------------

    // Constructor para poder crear una reserva con sus datos
    public function __construct(int $id_huesped, int $id_habitacion, string $fecha_llegada, string $fecha_salida, float $precio_total, string $estado = "Pendiente") {
        $this->id_huesped = $id_huesped;
        $this->id_habitacion = $id_habitacion;
        $this->fecha_llegada = $fecha_llegada;
        $this->fecha_salida = $fecha_salida;
        $this->precio_total = $precio_total;
        $this->estado = $estado;
    }

// --------------------------------------------------------------------

    // Métodos getter y setter
    public function getIdHuesped(): int {
        return $this->id_huesped;
    }

    public function setIdHuesped(int $id_huesped): void {
        $this->id_huesped = $id_huesped;
    }

    public function getIdHabitacion(): int {
        return $this->id_habitacion;
    }

    public function setIdHabitacion(int $id_habitacion): void {
        $this->id_habitacion = $id_habitacion;
    }

    public function getFechaLlegada(): string {
        return $this->fecha_llegada;
    }

    public function setFechaLlegada(string $fecha_llegada): void {
        $this->fecha_llegada = $fecha_llegada;
    }

    public function getFechaSalida(): string {
        return $this->fecha_salida;
    }

    public function setFechaSalida(string $fecha_salida): void {
        $this->fecha_salida = $fecha_salida;
    }

    public function getPrecioTotal(): float {
        return $this->precio_total;
    }

    public function setPrecioTotal(float $precio_total): void {
        $this->precio_total = $precio_total;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function setEstado(string $estado): void {
        $this->estado = $estado;
    }

// --------------------------------------------------------------------

    // Método para obtener las reservas desde nuestra base de datos
    public static function obtenerReservas(): array {
        // Incluimos la conexión PDO
        require_once __DIR__ . '/../db/conexion.php';

        try {
            // Preparamos la consulta
            $consulta = $conexion->query("SELECT * FROM reservas");

            // Guardamos todas las filas que devuelve la consulta
            $reservas = $consulta->fetchAll(PDO::FETCH_ASSOC);

            // Devolvemos el array con todas las reservas
            return $reservas;

        } catch (PDOException $e) {
            // En caso de error, mostramos el mensaje
            echo "Error al obtener reservas: " . $e->getMessage();
            return [];
        }
    }

}
