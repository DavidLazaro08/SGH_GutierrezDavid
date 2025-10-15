<?php
declare(strict_types=1);

// Clase que representa a un huésped del hotel.
class Huesped {

    // Propiedades de la clase Huesped
    private int $id;
    private string $nombre;
    private string $email;
    private string $documento_identidad;

// --------------------------------------------------------------------

    // Constructor para poder crear un huésped con sus datos
    public function __construct(string $nombre, string $email, string $documento_identidad) {
        $this->nombre = $nombre;
        $this->email = $email;
        $this->documento_identidad = $documento_identidad;
    }

// --------------------------------------------------------------------

    // Métodos getter y setter
    public function getNombre(): string {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function getDocumentoIdentidad(): string {
        return $this->documento_identidad;
    }

    public function setDocumentoIdentidad(string $documento_identidad): void {
        $this->documento_identidad = $documento_identidad;
    }

// --------------------------------------------------------------------

    // Método para obtener los huéspedes desde nuestra base de datos
    public static function obtenerHuespedes(): array {
        // Incluimos la conexión PDO
        require_once __DIR__ . '/../db/conexion.php';

        try {
            // Preparamos la consulta
            $consulta = $conexion->query("SELECT * FROM huespedes");

            // Guardamos todas las filas que devuelve la consulta
            $huespedes = $consulta->fetchAll(PDO::FETCH_ASSOC);

            // Devolvemos el array con todos los huéspedes
            return $huespedes;

        } catch (PDOException $e) {
            // En caso de error, mostramos el mensaje
            echo "Error al obtener huéspedes: " . $e->getMessage();
            return [];
        }
    }

}
