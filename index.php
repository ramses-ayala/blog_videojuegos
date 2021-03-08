
    <!--REQUIRE DE LA CABECERA-->
    <?php require_once "includes/cabecera.php"; ?>

        <?php require_once "includes/categorias.php"; ?>
        <!--BARRA LATERAL (SIDEBAR)-->
        <?php require_once "includes/barra_lateral.php" ?>


        <div id="principal">
            <h1>Ultimas Entradas</h1>
            <?php if($resultado != false): ?>
            <?php while($r = mysqli_fetch_assoc($resultado)): ?>
            <article class="entrada">
                <a href="">
                    <h2><?= $r['titulo'] ?></h2>
                    <p><?= $r['descripcion'] ?></p>
                </a>
            </article>
            <?php endwhile; ?>
            <?php endif; ?>

            <div id="ver-todas">
                <a href="">Ver todas las entradas</a>
            </div>
            
        </div>  <!--#principal-->
    
    
    <!--PIE DE PAGINA-->
    <?php require_once "includes/pie.php"; ?>