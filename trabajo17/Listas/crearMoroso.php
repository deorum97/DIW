<?php
  session_start();

  if(!isset($_SESSION["usuario"])){
    header("Location:../index.php");
  }

  $descripcion = $monto = "";

  if($_SERVER["REQUEST_METHOD"]==="POST"){
    header("Location:../mantenimiento.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear-morosos</title>
    
    <link rel="stylesheet" href="../estilos/style2.css">
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">
          <a href="../index.php"><i><b>PayPay</b></i></a>
        </div>

        <ul class="nav-links">
          
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
                    <li><a href="../mantenimiento">Perfil</a></li>
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
    
    <main class="login">
        <aside class="sidebar">
        <nav class="menu">
          <h2 class="menu-title">Mapa del Sitio</h2>

          <ul class="menu-list">

            <li class="menu-item">
                <a href="../index.php">🏠 Inicio</a>
            </li>

            <li class="menu-section">Gestión</li>
            <ul class="submenu">
                <li><a href="gestion/login.php">🔐 Login</a></li>
                <li><a href="gestion/registro.php">📝 Registro</a></li>
            </ul>

            <li class="menu-section">Listas <span class="nota">(requiere login)</span></li>
            <ul class="submenu">
                <li><a href="listas.php">📄 Ver listas</a></li>
                <li><a href="crearLista.php">➕ Crear lista</a></li>
                <li><a href="crearMoroso.php">⚠️ Crear moroso</a></li>
            </ul>

            <li class="menu-item">
                <a href="../mantenimiento.php">🛠 Mantenimiento</a>
            </li>

          </ul>
        </nav>
      </aside>
        <div class="card_lista">
            <div class="card2">
                <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <p id="heading">Creacion de Moroso</p>
                <div class="field">
                    <input
                    type="text"
                    class="input-field"
                    placeholder="Usuario"
                    autocomplete="off"
                    name="descripcion"
                    required
                    />
                </div>
                
                <div class="field">
                    <input
                    type="number"
                    class="input-field"
                    placeholder="Cantidad"
                    autocomplete="off"
                    name="monto"
                    required
                    />
                </div>
                <button class="button3" type="submit">Añadir gasto</button>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
