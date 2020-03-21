<header>
    <div class="tagDivCabecera">
        <a href="/ProyectoGymArt/index.php"><img src="/ProyectoGymArt/imagenes/logo1.png"></a>
        <nav class="navegacion">
            <li> <a href="">QUIENES SOMOS</a></li>
            <li><a href="">CONTACTO</a></li>
            <li><a href="/ProyectoGymArt/cuotas.php">CUOTAS</a></li>
            <li><a href="clientes/verClientes.php">GESTIONAR CLIENTES</a></li>
            <li><a href="usuarios/registrar_usuario.php">REGISTRARSE</a></li>
            <div class="botonIniciar">
                <li><a href="usuarios/inicioSesion.php">INICIAR SESION</a></li>
            </div>
        </nav>
        <div>
            <?php
            session_start();
            if ($_SESSION) {
            ?>
                <div class="Bienvenido">
                    <p>Bienvenido, <?php echo $_SESSION['usuario'] ?></p>
                    <nav class="navegacion">
                        <li>
                        <li><a href="">CERRAR USUARIO</a></li>

                        <!-- <form action="index.php" method="POST">
                            <input type="submit" value="Cerrar session" name="cerrar-session">
                        </form> -->
                        </li>

                    </nav>

                </div>
            <?php
            } else {
            }
            if ($_POST) {
                if (isset($_POST['cerrar-session'])) {
                    session_unset();
                    header('Location:index.php');
                }
            }
            ?>
        </div>
    </div>
</header>