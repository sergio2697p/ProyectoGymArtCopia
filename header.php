<?php

if (!isset($_SESSION)) {
    session_start();
}
?>
<header>
    <!-- Encabezado -->
    <div class="tagDivCabecera">
        <a href="/ProyectoGymArtCopia/index.php"><img src="/ProyectoGymArtCopia/imagenes/logo1.png"></a>
        
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>

        <nav class="navegacion">
            <ul>

                <!-- Si existe $_SESSION que no muestre el iniciar sesion ni el registrarse, en caso de que no exista que lo muestre -->
                <?php
                if ($_SESSION) {
                } else {
                ?>
                    <div class="botonIniciar">
                        <li><a href="/ProyectoGymArtCopia/usuarios/inicioSesion.php">INICIAR SESIÓN</a></li>
                    </div>
                    <li><a href="usuarios/registrar_usuario.php">REGISTRARSE</a></li>
                <?php
                }
                ?>

                <!-- Si hay $_SESSION que muestre el resto de apartados de nuestra pagina -->
                <?php
                if ($_SESSION) {
                ?>
                    <li><a href="/ProyectoGymArtCopia/cuotas.php">CUOTAS</a></li>
                    <li>GESTIONAR
                        <ul class="subnavegacion">
                            <li><a href="/ProyectoGymArtCopia/clientes/verClientes.php">Clientes</a></li>
                            <li><a href="/ProyectoGymArtCopia/mensualidades/verMensualidades.php">Mensualidades</a></li>
                            <li><a href="/ProyectoGymArtCopia/pagos/gestionarPagos.php"> Pagos</a></li>
                        </ul>
                    </li>
                    <li> <a href="">QUIENES SOMOS</a></li>
                    <li><a href="">CONTACTO</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>

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
    }
    ?>

    <?php
    if ($_POST) {
        if (isset($_POST['cerrar-session'])) {
            session_unset();
            header('Location:/ProyectoGymArtCopia/index.php');
        }
    } 
    ?>

</header>

