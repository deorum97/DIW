<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PayPay</title>
    
    <link rel="stylesheet" href="estilos/style2.css">
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">
          <a href="index.php"><i><b>PayPay</b></i></a>
        </div>

        <ul class="nav-links">
          <li><a href="#">Contacto</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle">Documentación ▾</a>
            <ul class="dropdown-menu">
              <li><a href="#">Cómo empezar</a></li>
              <li><a href="#">Avanzado</a></li>
              <li><hr></li>
              <li><a href="#">Q&A</a></li>
            </ul>
          </li>
        </ul>
        <?php
          if(isset($_SESSION["usuario"])){
            ?>
              <div class="nav-buttons">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle"><?php echo $_SESSION["usuario"]; ?> ▾</a>
                  <ul class="dropdown-menu-usuario">
                    <li><a href="listas/listas.php">Mis gastos</a></li>
                    <li><a href="#">Perfil</a></li>
                  </ul>
                </li>
                <a href="gestion/unLogin.php">
                  <button class="btn-outline-dark">
                    Desloguearse
                  </button>
                </a>
              </div>
            <?php
          }else{
            ?>

        <div class="nav-buttons">
          <a href="gestion/login.php"><button class="btn-outline-dark">Loguearse</button></a>
          <a href="gestion/registro.php"><button class="btn-outline-dark">Registrarse</button></a>
        </div>
        <?php
              }
            ?>
      </nav>
    </header>
    
    <main>
      <aside class="sidebar">
        <h2>Mapa del Sitio</h2>
        <nav>
          <ul>
            <li><a href="index.php">Inicio</a></li>

            <li><strong>Gestión</strong>
              <ul>
                <li><a href="gestion/login.php">Login</a></li>
                <li><a href="gestion/registro.php">Registro</a></li>
              </ul>
            </li>

            <li><strong>Listas (solo se ven si estas logueado)</strong>
              <ul>
                <li><a href="Listas/listas.php">Ver listas</a></li>
                <li><a href="Listas/crearLista.php">Crear lista</a></li>
                <li><a href="Listas/crearMoroso.php">Crear moroso</a></li>
              </ul>
            </li>

            <li><a href="mantenimiento.php">Mantenimiento</a></li>
          </ul>
        </nav>
      </aside>
      <section>
        <h1>Bienvenido a PayPay, tu gestor de gastos personal</h1>
        <p>
            Organiza tus finanzas de manera sencilla creando listas de gastos,
            registrando tus compras y llevando un control claro de tu dinero.
        </p>

        <h2>¿Qué puedes hacer con PayPay?</h2>
        <ul>
            <li>Registrar tus gastos de forma rápida y ordenada.</li>
            <li>Crear listas personalizadas para gestionar los gastos y registrar quien te debe pagos.</li>
            <li>Compartir y asignar usuarios a cada lista para gestionar gastos en grupo.</li>
        </ul>

        <p>
            Todo en una plataforma intuitiva, segura y pensada para que tengas tu
            economía bajo control.
        </p>

        <p><strong>Empieza a gestionar tus gastos de forma inteligente.</strong></p>

        <div class="actions">
          <a href="gestion/login.php">
            <button class="btn-outline-dark">Iniciar sesión</button>
          </a>
          <a href="gestion/registro.php">
            <button class="btn-outline-dark">Registrarte</button>
          </a>
        </div>
      </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
