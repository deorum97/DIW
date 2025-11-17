<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mantenimiento</title>
    
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
                    <li><a href="listas.php">Mis gastos</a></li>
                    <li><a href="#">Perfil</a></li>
                  </ul>
                </li>
                <a href="../gestion/unLogin.php">
                  <button class="btn-outline-dark">
                    Desloguearse
                  </button>
                </a>
              </div>
            <?php
          }else{
            ?>

        <div class="nav-buttons">
          <a href="../gestion/login.php"><button class="btn-outline-dark">Loguearse</button></a>
          <a href="../gestion/registro.php"><button class="btn-outline-dark">Registrarse</button></a>
        </div>
        <?php
              }
            ?>
      </nav>
    </header>
    
    <main>
      <section>
        <img src="imagenes/problemasTecnicos.gif" alt="imagen de mantenimiento">
        <audio src="./sonido/mantenimientoSonido.mp3" autoplay></audio>
      </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
