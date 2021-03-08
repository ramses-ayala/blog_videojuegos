
<?php 

    if(isset($_POST)){
        
        // REQUERIR CONEXION A LA BASE DE DATOS
        require_once 'includes/conexion.php';

        if(!isset($_SESSION)){
            session_start();
        }

        //$_SESSION['prueba'] = "ESTA ES UNA PRUEBA DE SESION";
        //$_SESSION['prueba'] = null;
        //unset($_SESSION['prueba']);
        
        
        // 1 - CAPTURAR LOS DATOS DEL FORMULARIO
        // SE UTILIZA EN ESTE CASO EL OPERADOR TERNARIO PARA NO HACER if ANIDADOS
        
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : false;
        $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion,$_POST['apellidos']) : false;
        $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion,trim($_POST['email'])) : false;
        $password = isset($_POST['password']) ? mysqli_real_escape_string($conexion,trim($_POST['password'])) : false;

        
        // 2 - VALIDAR LOS DATOS
        // ARREGLO DE ERRORES
        //$errores = array();

        $validacion_nombre = !empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre);
        $validacion_apellidos = !empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos);
        $validacion_email = !empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL);
        $validacion_contrasena = !empty($password);

        if($validacion_nombre && $validacion_apellidos && $validacion_email && $validacion_contrasena)
        {

            // CIFRAR CONTRASEÑA
            $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

            // CREAR INSTRUCCION SQL
            $sql = "INSERT INTO usuarios VALUES(null,'$nombre','$apellidos','$email','$password_segura',CURDATE())";

            // HACER LA CONSLTA A LA BD Y GUARDAR LA RESPUESTA
            $guardar = mysqli_query($conexion,$sql);

            // 4 - SABER SI FUE EXITOSA LA PETICION A LA BASE DE DATOS
            if($guardar)
            {
                $_SESSION['completado'] = "EL REGISTRO SE HA COMPLETADO CON EXITO";
            }
            else
            {
                $_SESSION['error']['insercion'] = "NO SE GUARDARON LOS DATOS A LA BD :(";
            }


        }
        else
        {
            $_SESSION['error_registro'] = "!!! RELLENE TODOS LOS CAMPOS POR FAVOR !!!";
        }

        // REDIRECCIONAR AL INDEX
        header("Location: index.php");

        // VALIDACION DEL NOMBRE
        /* if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre))
        {
            //$nombre_validado = true;
            echo "NOMBRE CORRECTO" . "<br/>";
        }
        else
        {   
            //$nombre_validado = false;
            $errores["nombre"] = "NOMBRE MAL";
        } */
        /* 

        // VALIDACION DE LOS APELLIDOS
        if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos))
        {
            //$apellidos_validado = true;
            echo "APELLIDOS CORRECTOS" . "<br/>";
        }
        else
        {   
            //$apellidos_validado = false;
            $errores["apellidos"] = "APELLIDOS MAL";
        }

        if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            //$email_validado = true;
            echo "EMAIL CORRECTO"."<br/>";
        }
        else
        {   
            //$email_validado = false;
            $errores["email"] = "EL EMAIL NO ES CORRECTO";
        }
        
        
        if(!empty($password))
        {
            //$password_validado = true;
            echo "PASSWORD CORRECTA" ."<br/>";
        }
        else
        {   
            //$password_validado = false;
            $errores["password"] = "EL CAMPO DE LA PASSWORD ESTA VACIO";
        } */

        
        /*if(count($errores) == 0){
            // 1 - CIFRAR EL PASSWORD

            $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

            // VERIFICAR QUE EL PASSWORD SEA CORRECTO
            //var_dump(password_verify($password,$password_segura)); // ESTA FUNCION DEVUELVE TRUE O FALSE
            // TRUE SI LA CONTRASEÑA NORMAL Y LA CIFRADA SON CORRECTAS Y EN CASO CONTRARIO CUANDO NO LO SON.

            // 2 - CREAR LA CONSULTA SQL
            $sql = "INSERT INTO usuarios VALUES(null,'$nombre','$apellidos','$email','$password_segura',CURDATE())";

            // 3-  HACER LA PETICION A LA BASE DE DATOS
            $guardar = mysqli_query($conexion,$sql);

            // 4 - SABER SI FUE EXITOSA LA PETICION A LA BASE DE DATOS
            if($guardar)
            {
                $_SESSION['completado'] = "EL REGISTRO SE HA COMPLETADO CON EXITO";
            }
            else
            {
                $_SESSION['error']['insercion'] = "NO SE GUARDARON LOS DATOS A LA BD :(";
            }
            
        }
        else
        {
            $_SESSION['errores'] = $errores;
            //var_dump($_SESSION['errores']);
            
            //var_dump($_SESSION['errores']['nombre']);
            //die();
            //die();
            //var_dump($_SESSION['er']);
                //CON EL var_dump SE MUESTRA LO QUE CONTIENE  EL ARREGLO $_SESSION['er'] Y CONTIENE LOS VALORES QUE 
                //TIENE  EL ARREGLO $errores SOLO QUE ESTE ARREGLO ($errores) SE ASIGNO AL ARREGLO $_SESSION['er']

                //SE HACE var_dump($_SESSION['er']['nombre']); SOLO VA IMPRIMIR EL VALOR DE LO QUE CONTIENE EL 
                //INDICE nombre
            //
        }

        header("Location: index.php"); */

    }
?>