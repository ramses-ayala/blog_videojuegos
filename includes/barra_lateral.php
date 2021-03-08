

<aside id="sidebar">

    <?php if(isset($_SESSION['usuario'])): ?>
        <div class="usuario-logueado">
            <h3>Bienvenido <?php echo $_SESSION['usuario']['nombre'] . " " . $_SESSION['usuario']['apellidos']; ?></h3>
            <?php //var_dump($_SESSION['usuario']); ?>
            <!--BOTONES-->
            <a href="cerrar.php" class="boton boton-verde">Crear Entrada</a>
            <a href="cerrar.php" class="boton boton-naranja">Mis Datos</a>
            <a href="cerrar.php" class="boton">Cerrar Sesion</a>
            
        </div>
    <?php endif; ?>

    <div id="login" class="bloque">
        <h3>IDENTIFICATE</h3>

        <?php if(isset($_SESSION['error_login'])): ?>

            <div class="alerta alerta-error">
                <?php echo $_SESSION['error_login']; ?>
            </div>
        
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" />

            <label for="password">Password</label>
            <input type="password" name="password" id="password" />

            <input type="submit" value="Iniciar sesion"/>
        </form>
    </div>

    <div class="bloque">
        <h3>REGISTRAR</h3>
        
        <!--MOSTRAR ERRORES-->
        <?php if(isset($_SESSION['completado'])): ?>

            <div class="alerta alerta-exito">
                <?php echo $_SESSION['completado']; ?>
            </div>

        <?php elseif(isset($_SESSION['error']['insercion'])): ?>

            <div class="alerta alerta-error">
                <?php echo $_SESSION['error']['insercion']; ?>
            </div>

        <?php endif; ?>


        <form action="registro.php" method="POST">

            <?php if(isset($_SESSION['error_registro'])): ?>

                <div class="alerta alerta-error">
                    <?php echo $_SESSION['error_registro']; ?>
                </div>

            <?php endif; ?>


            <label for="nom">Nombre</label>
            <input type="text" name="nombre" id="nombre" pattern="[a-zA-Z ]+" required/>

            <?php //echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'):''; ?>


            <label for="ape">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" pattern="[a-zA-Z ]+" required/>

            <?php //echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos'):''; ?>


            <label for="email">Email</label>
            <input type="email" name="email" id="email" required/>

            <?php //echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email'):''; ?>


            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" required/>

            <?php //echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password'):''; ?>
            
            
            <input type="submit" value="Registrar"/>

        </form>
        
        <?php borrarErrores(); ?>

    </div>
</aside>