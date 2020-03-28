<?php
//session_start();
?>
<header>
    <!-- Encabezado -->
    <div class="tagDivCabecera">
        <a href="/ProyectoGymArtCopia/index.php"><img src="/ProyectoGymArt/imagenes/logo1.png"></a>
        <nav class="navegacion">
            <ul>
                <li> <a href="">QUIENES SOMOS</a></li>
                <li><a href="">CONTACTO</a></li>
                <li><a href="/ProyectoGymArtCopia/cuotas.php">CUOTAS</a></li>
                <li>GESTIONAR
                    <ul class="subnavegacion">
                        <li><a href="/ProyectoGymArtCopia/clientes/verClientes.php">Clientes</a></li>
                        <li><a href="/ProyectoGymArtCopia/mensualidades/verMensualidades.php">Mensualidades</a></li>
                        <li><a href=""> Pagos</a></li>
                    </ul>
                </li>
                <li><a href="usuarios/registrar_usuario.php">REGISTRARSE</a></li>
                <div class="botonIniciar">
                    <li><a href="/ProyectoGymArtCopia/usuarios/inicioSesion.php">INICIAR SESIÓN</a></li>
                </div>
        </nav>
    </div>
    <?php
    if ($_SESSION) {
    ?>
        <div class="cerrarSesion">
            <p>Bienvenido, <?php echo $_SESSION['usuario']
                            ?></p>
            <form action="index.php" method="POST">
                <input type="submit" value="Cerrar session" name="cerrar-session">
            </form>
        </div>

        </li>
    <?php
    } else {
    }
    if ($_POST) {
        if (isset($_POST['cerrar-session'])) {
            session_unset();
            header('Location:/ProyectoGymArtCopia/index.php');
        }
    }
    ?>

</header>