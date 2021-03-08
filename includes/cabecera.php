<?php require_once "conexion.php"; ?>
<?php require_once "helpers.php"; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROYECTO PHP Y MYSQL</title>
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>

    <!--CABECERA-->
    <header id="cabecera">
        <div id="logo">
            <a href="index.php">Blog de videojuegos</a>
        </div>

        <nav id="menu" class="navegacion-principal">

        <?php $resultadoCategorias = obtenerCategorias(); ?>
        <?php if($resultadoCategorias != false): ?>

            <ul>
                <?php while($categoria = mysqli_fetch_assoc($resultadoCategorias)):?>
                    <li><a href="categorias.php?id=<?= $categoria['id'] ?>"><?php echo $categoria['nombre'] ?></a></li>
                <?php endwhile; ?>
            </ul>            

        <?php endif; ?>
        </nav>
        <div class="clearfix"></div>
    </header>

    <div class="contenedor">