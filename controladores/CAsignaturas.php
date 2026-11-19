
<?php
    // Cargamos el modelo.
    include 'modelos/mAsignatura.php';

    class CAsignaturas {

        public $vista;
        public $id;
        public $nombre;
        public $color;
        public $si;

        // Recogemos todos los datos una sola vez.
        function __construct() {
            if (isset($_GET['id'])) {
                $this->id = $_GET['id'];
            }

            if (isset($_POST['nombre'])) {
                $this->nombre = $_POST['nombre'];
            }

            if (isset($_POST['color'])) {
                $this->color = $_POST['color'];
            }

            if (isset($_POST['si'])) {
                $this->si = $_POST['si'];
            }
        }

        // Obtener todas las asignaturas.
        function obtenerAsignaturas() {
            $datos = new Asignatura();
            $asignaturas = $datos->consultarTodas();
            $this->vista = 'vistas/vAsignaturas.php';
            return $asignaturas;
        }

        // Insertar asignatura.
        function insertarAsignatura() {
            if (isset($this->nombre) && isset($this->color) && $this->validar($this->nombre, $this->color)) {
                $datos = new Asignatura();
                if ($datos->guardarNueva($this->nombre, $this->color)) {
                    $this->vista = 'vistas/vOperacionCorrecta.html';
                }
                else {
                    $this->vista = 'vistas/vOperacionError.html';
                }
            }
            else {
                $this->vista = 'vistas/vOperacionError.html';
            }
        }

        // Obtener asignatura para modificar.
        function obtenerAsignaturaModificar() {
            if (!empty($this->id)) {
                $datos = new Asignatura();
                $asignatura = $datos->consultarPorCodigo($this->id);
                $this->vista = 'vistas/vModificar.html';
                return $asignatura;
            }
            else {
                $this->vista = 'vistas/vOperacionError.html';
            }
        }

        // Modificar asignatura.
        function modificarAsignatura() {
            if (!empty($this->id) && isset($this->nombre) && isset($this->color) && $this->validar($this->nombre, $this->color)) {
                $datos = new Asignatura();
                if ($datos->guardarCambios($this->id, $this->nombre, $this->color)) {
                    $this->vista = 'vistas/vOperacionCorrecta.html';
                }
                else {
                    $this->vista = 'vistas/vOperacionError.html';
                }
            }
            else {
                $this->vista = 'vistas/vOperacionError.html';
            }
        }

        
        // Obtener asignatura para eliminar.
        function obtenerAsignaturaEliminar() {
            if (!empty($this->id)) {
                $datos = new Asignatura();
                $asignatura = $datos->consultarPorCodigo($this->id);
                $this->vista = 'vistas/vEliminar.html';
                return $asignatura;
            }
            else {
                $this->vista = 'vistas/vOperacionError.html';
            }
        }

        

        

        // Eliminar asignatura.
        function eliminarAsignatura() {
            if (!empty($this->id) && isset($this->si)) {
                $datos = new Asignatura();
                if ($datos->borrarPorCodigo($this->id)) {
                    $this->vista = 'vistas/vOperacionCorrecta.html';
                }
                else {
                    $this->vista = 'vistas/vOperacionError.html';
                }
            }
            else {
                $this->vista = 'vistas/vOperacionError.html';
            }
        }

        // Validar datos.
        function validar($nombre, $color) {
            return !empty($nombre) && !empty($color);
        }
    }
?>
