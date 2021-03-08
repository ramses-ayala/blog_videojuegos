
<?php

    
    

        if(!empty($_GET['id'])){
            $conexion;
    
            $id =  mysqli_real_escape_string($conexion, $_GET['id']);
    
            $instruccionSQL = "SELECT titulo, descripcion FROM entradas where categoria_id=".$id ." limit 3";
    
            $entradas = mysqli_query($conexion, $instruccionSQL);
    
            $resultado = false;
    
            if(mysqli_nums_rows($entradas) >= 1){
                $resultado = $entradas;
            }
    
            
    
    
        }
    

    

?>