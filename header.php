<?php
if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST['cerrar-session'])) {
    session_unset();
    header('Location:/ProyectoGymArtCopia/index.php');
}
?>

<header>
    <!-- Encabezado -->
    <div class="zona-logo">
        <a href="/ProyectoGymArtCopia/index.php">
            <img src="/ProyectoGymArtCopia/imagenes/logo1.png">
        </a>
    </div>

    <div class="zona-botones">
        <!-- Si hay $_SESSION que muestre el boton de cerrar sesión -->
        <?php
        if ($_SESSION) {
        ?>
            <div class="cerrarSesion">
                <p>Bienvenido, <?php echo $_SESSION['usuario']
                                ?></p>
                <form action="<?php echo $_SERVER["PHP_SELF"] . "/index.php"  ?>" method="POST">
                    <input class="botonCerrar" type="submit" value="Cerrar sesión" name="cerrar-session">
                </form>
            </div>
        <?php
        } else {
        ?>
            <a class="boton-iniciar" href="/ProyectoGymArtCopia/usuarios/inicioSesion.php">INICIAR SESIÓN</a>
            <a class="boton-registrarse" href="usuarios/registrar_usuario.php">REGISTRARSE</a>
        <?php
        }
        ?>
    </div>

    <div class="zona-hamburguesa">
        <!--Boton Hamburguesa-->
        <input type="checkbox" id="eChkHamburguesa" class="hamburguesa-checkbox" selected>
        <label for="eChkHamburguesa" class="hamburguesa-label">
            <i class="fas fa-bars"></i>
        </label>
        <nav>
            <ul>
                <li><a href="/ProyectoGymArtCopia/cuotas.php">CUOTAS</a></li>

                <!-- Si hay $_SESSION que muestre el resto de apartados de nuestra pagina -->
                <?php
                if ($_SESSION) {
                ?>
                    <li>
                        <input type="checkbox" id="eChkGestionar" class="gestionar-checkbox">
                        <label for="eChkGestionar" class="gestionar-label">
                            GESTIONAR
                        </label>
                        <ul class="gestionar-submenu">
                            <li><a href="/ProyectoGymArtCopia/clientes/verClientes.php">Clientes</a></li>
                            <li><a href="/ProyectoGymArtCopia/mensualidades/verMensualidades.php">Mensualidades</a></li>
                            <li><a href="/ProyectoGymArtCopia/pagos/gestionarPagos.php"> Pagos</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <li> <a href="">QUIENES SOMOS</a></li>
                <li><a href="">CONTACTO</a></li>
            </ul>
        </nav>
    </div>
</header>