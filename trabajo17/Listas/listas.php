<?php
  session_start();

  $result = "";

  if(!isset($_SESSION["usuario"])){
    header("Location:../index.php");
  }else{
    require_once("../gestion/conexion.php");

    try{
      $usuario =$_SESSION["usuario"];
      $sql= "SELECT * FROM `gastos` WHERE `id_usuario` = (SELECT `id_usuario` FROM `usuarios` WHERE `nombre` = '$usuario');";

      $stmt = $conn->prepare($sql);
      $stmt->execute();

      $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn=null;

  }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Listas-gastos</title>
    
    <link rel="stylesheet" href="../estilos/style2.css">
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">
          <a href="../index.php"><i><b>PayPay</b></i></a>
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
      <section class="listas">
        <article>
        <?php
        if(!empty($result)){
          foreach($result as $row) {
            
            echo "<div class='descripcion'><p>".$row["descripcion"]."</p><p>".$row["monto"]."</p></div>";

            require("../gestion/conexion.php");
            try{
              $id=$row["id_gasto"];
              $sqlgasto= "SELECT * FROM `usuarios_gasto` WHERE `id_gasto` = '$id';";

              $stmt = $conn->prepare($sqlgasto);
              $stmt->execute();

              $resultg = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
              $resultg = $stmt->fetchAll(PDO::FETCH_ASSOC);

            }catch(PDOException $e) {
              echo $sqlgasto . "<br>" . $e->getMessage();
            }

            foreach($resultg as $rowg) {
              $sqlUsuario = "SELECT `nombre` FROM `usuarios` WHERE `id_usuario` = '".$rowg['id_usuario']."';";
              $stmtU = $conn->prepare($sqlUsuario);
              $stmtU->execute();
              $resultu = $stmtU->setFetchMode(PDO::FETCH_ASSOC); 
              $resultu = $stmtU->fetchAll(PDO::FETCH_ASSOC);

              echo "<div class='elemento_lista'>";
              echo "<p>".$resultu[0]['nombre']."</p>";
              echo "<p>".$rowg['monto_participacion']."</p>";
              echo "</div>";
            }
            
            echo "<div class='elemento_lista'><a href='crearMoroso.php'><button class='btn-outline-dark'>Añade Moroso</button></a></div>";
            
          }
          $conn=null;
        }
        ?>
        <div class="descripcion">
          <a href="crearLista.php"><button class="btn-outline-dark">Nuevo Gasto</button></a>
        </div>
        
        </article>
      </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
