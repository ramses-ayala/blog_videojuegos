<?php 

    // 1 - INICIAR LA SESION Y LA CONEXION A LA BASE DE DATOS
    require_once 'includes/conexion.php';

    // 2 -  RECOGER DATOS DEL FORMULARIO

    if(isset($_POST)){

        // BORRA TODAS LA SESION ANTERIOR, ES DECIR SI HUBO UN ERROR BORRA LA SESION DEL ERROR
        if(isset($_SESSION['error_login'])){
            //session_unset($_SESSION['error_login']);
            session_unset();
        }

        $email = mysqli_real_escape_string($conexion,trim($_POST['email']));
        $password = trim($_POST['password']);

        // 3 - CONSULTA PARA COMPROBAR LAS CREDENCIALES DEL USUARIO
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = mysqli_query($conexion,$sql);


        /*si la variable login que es la consulta a la BASE DE DATOS ES VERDAD Y ARROJA UN REGISTRO VA HACER LO
        DEL IF, Y SE CREA UNA VARIABLE $usuario PARA HACER UN ARREGLO ASOCIATIVO DE LO QUE ARROJE LA CONSULTA $login
        */

        /*
        var_dump($login);
        var_dump(mysqli_num_rows($login));
        var_dump(mysqli_fetch_assoc($login));
        die();*/

        if(mysqli_num_rows($login) == 1){

            $usuario = mysqli_fetch_assoc($login);
             
            // 4 - COMPROBAR LA CONTRASEÑA
            // SE COMPARA EL $password QUE ES EL ORIGINAL QUE SE INGRESO POR EL CAMPO DE TEXTO CON $usuario['pass']
            //QUE ES LA PASSWORD CONVERTIDA EN HASH  
            $verificar = password_verify($password,$usuario['pass']);
            
            if($verificar){
                // 5 - UTILIZAR UNA SESION PARA GUARDAR LOS DATOS DEL USUARIO LOQUEADO
                //AQUI SE CREA LA VARIABLE DE SESION LLAMADA 'usuario' Y SE LE ASIGNA LA VARIABLE $usuario QUE ES
                //LO QUE ARROJA LA CONSULTA $login 
                $_SESSION['usuario'] = $usuario;
            }
            else
            {
                // 6 - SI ALGO FALLA ENVIAR UNA SESION CON EL FALLO
                //SI LA VARIABLE $verificar ES FALSE SE CREA OTRA VARIABLE DE SESION MOSTRANDO UN ERROR 
                $_SESSION['error_login'] = "ERROR AL INGRESAR";
            }
        }
        else
        {
            $_SESSION['error_login'] = "NO HAY REGISTROS";
        }
        
    }

    // 7 - REDIRIGIR AL index.php
    header('Location: index.php');
 

?>