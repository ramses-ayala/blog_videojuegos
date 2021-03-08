<?php 

    function mostrarError($errores,$campo){
        
        $alerta = '';

        if(isset($errores[$campo])){
            $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . "</div>";
        }

        return $alerta;
    }
    

    function borrarErrores(){
        
        /* $borrado = session_unset($_SESSION['er']);  ESTA FUNCION SE UTILIZO EN EL VIDEO 195
        la descripcion de esta funcion es: libera todas las variables de sesion.

        return $borrado; */
        
        
        
        // EL session_unset SE PODRIA HACER CON CADA UNA DE LAS SIGUIENTES VARIABLES
        
       /*  if(isset($_SESSION['er'])){
            $_SESSION['er'] = null;
            unset($_SESSION['er']);
            
        }
        
        if(isset($_SESSION['completado'])){
            $_SESSION['completado'] = null;
            unset($_SESSION['completado']);
        }
        
        $_SESSION['er']['general'] = null;
        unset($_SESSION['er']['general']); */

        
        $borrado = false;

        if(isset($_SESSION['error_registro'])){
            $_SESSION['error_registro'] = null;
            //$borrado = session_unset($_SESSION['er']);
            session_unset();
        }

        if(isset($_SESSION['completado'])){
            $_SESSION['completado'] = null;
            session_unset();
        }

        return $borrado;
    }

    function obtenerCategorias(){

        global $conexion;

        $instruccionSQL = "SELECT * FROM categorias";

        $categorias = mysqli_query($conexion,$instruccionSQL);

        
        $resultado = false;

        if(mysqli_num_rows($categorias) >= 1){
            $resultado = $categorias;
        }

        return $resultado;

    }

    /*function listarUltimasEntradas(id){
        $conexion;

        $instruccionSQL = "SELECT *FROM entradas where categoria_id="id;

        $entradas = mysqli_query($conexion, $instruccionSQL);


    }*/

    // ---------------------------------------------------
/* 
    $borrado = false;

    if(isset($_SESSION['er'])){
        $_SESSION['er'] = null;
        //$borrado = session_unset($_SESSION['er']);
        session_unset();
    }

    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        session_unset();
    }

    return $borrado; */

?>