<?php 

    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $basededatos = "blog_master";


    $conexion = mysqli_connect($servidor,$usuario,$password,$basededatos);

    mysqli_query($conexion,"SET NAMES 'utf8'");


    //INICIAR SESION
    session_start();

?>