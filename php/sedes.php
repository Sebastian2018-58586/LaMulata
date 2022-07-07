<!DOCTYPE html>
<?php
$idurestaurante=$_POST['idurestaurante'];
session_start();
$_SESSION['idurestaurante']=$idurestaurante;

include_once "../modelos/conexion.php";

// $sentencia =  Conexion::conectar()->prepare("SELECT * FROM productos");
// $sentencia->execute();
// $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);

// $nombre = $_POST['nombre'];
$sentencia2 =  Conexion::conectar()->prepare("SELECT * FROM restaurante");
$sentencia2->execute();
$categorias = $sentencia2->fetchAll(PDO::FETCH_OBJ);

// $datos->idrestaurante;
//print_r($categorias);

?>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Para que mi pagina cargue mas rapido -->
    <link rel="preload" href="../css1/index.css" as="style">
    <link rel="preload" href="../css1/cabecera.css" as="style">
    <!-- <link rel="preload" href="../css/s" as="style"> -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- conexion de la hoja de estilos creada style.css-->

    <!-- <link href="css1/style.css" rel="stylesheet"> -->
    <!-- MANEJAREMOS LOS ESTILOS CON STYLE , EL QUE ESTA ARRIBA  -->

    <!-- <link href="css1/Style1.css" rel="stylesheet"> -->

    <Link href="../css/bootstrap.min.css" rel="stylesheeet" media="screen">
    </Link>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
    <!-- estilos para el titulo-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- estilo de iconos -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- conexion de la hoja de estilos creada JS-->
    <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- estilos  -->
    <script src="../js/index.js" type="module"></script>
    <link rel="stylesheet" href="../css1/index.css">
    <link rel="stylesheet" href="../css1/cabecera.css">



    <!-- imagen que desaparece -->
    <style>
        body {
            /* background: #1a1a1a; */
            background: #ffff;
        }

        .bg {
            /* background-image: url(imagenes/platano.jpg); */
            /* background-image: url(../imagenes/TOSTON\ _TODO.png); */
            /* width: 10px;
            height: 10px; */
            background-size: cover;
            background-position: center;
        }
    </style>

</head>


<body class="body">

    <header class="header">
        <nav class="header-nav">
            <div class="header-nav-container">
                <a href="#" class="header-nav__logo-container">
                    <img src="../imagenes/Logo-sin.png" alt="Logo Web" class="header-nav__logo" />
                </a>
                <figure class="header-nav__menu-icon-container" id="headerNavMenuIconContainer">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff" class="header-nav__menu-icon">
                        <path d="M4 6h16v2H4zm4 5h12v2H8zm5 5h7v2h-7z"></path>
                    </svg>
                </figure>
                <ul class="header-nav__menu-link-list">
                    <li class="header-nav__menu-link-item">
                        <a href="../index.html" class="header-nav__menu-link">Inicio</a>
                    </li>
                    <li class="header-nav__menu-link-item">
                        <a href="#learning" class="header-nav__menu-link">Menù</a>
                    </li>
                    <li class="header-nav__menu-link-item">
                        <a href="#learning" class="header-nav__menu-link">Contactanos</a>
                    </li>
                    <li class="header-nav__menu-link-item">
                        <a href="#learning" class="header-nav__menu-link">PQRS</a>
                    </li>
                    <li class="header-nav__menu-link-item">
                        <a href="login.html" class="header-nav__menu-link">Inicio de sesión</a>
                    </li>
                    <!--           
          <li class="header-nav__menu-link-item">
            <a href="https://www.linkedin.com/in/elliotgaramendi/"
              class="header-nav__menu-link header-nav__menu-link--active" target="_blank"
              rel="noopener noreferrer">Elliot</a>
          </li> -->
                    <li class="header-nav__menu-link-item header-nav__menu-close-icon-container" id="headerNavMenuCloseIconContainer">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#fff" class="header-nav__menu-close-icon">
                            <path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z">
                            </path>
                            <path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z">
                            </path>
                        </svg>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- diesño login -->

    
    <!-- <div class="container-fluid w-75 bg-white mt-5 rounded shadow ">
        <div class="row align-items-stretch">
            <br>
            <br>
            <?php
            foreach ($categorias as $datos) {
                $hola = $datos->nombre;
            ?>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " href="#<?php echo $datos->idcategoriap; ?>" data-toggle="tab"><?php echo $datos->nombre; ?></a>
                </li> 
                <div class="col bg-white p-3 rounded-end">
                    <form action="../gestion.php" method="post">
                        <div class='d-grid '>
                            <button href="#<?php echo $datos->idrestaurante; ?>" type='submit' class='btn btn-primary' value='ingresar'><?php echo $datos->nombre; ?></button>
                            <input type='hidden' id='idrestaurante' value='".$idrestaurante."' />
                        </div>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>  -->

    
    <div class="container-fluid w-75 bg-white mt-5 rounded shadow ">
        <div class="row align-items-stretch">
            <br>
            <br>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " href="#<?php echo $datos->idcategoriap; ?>" data-toggle="tab"><?php echo $datos->nombre; ?></a>
                </li> 
                <div class="col bg-white p-3 rounded-end">
                    <form action="../gestion.php" method="post">
                        <div class='d-grid '>
                            <button href="#" type='submit' class='btn btn-primary' value='ingresar'></button>
                            <input type='hidden' id='idrestaurante' value='".$idrestaurante."' />
                        </div>
                    </form>
                </div>
            
            ?>
        </div>
    </div>  



    






    <!-- <div class="container-fluid w-75 bg-white mt-5 rounded shadow ">
        <div class="row align-items-stretch">

            <div class="col bg-white p-5 rounded-end">
                <form action="../gestion.php" method="post">
                    <div class="d-grid ">
                        <button type="submit" class="btn btn-primary" value="ingresars">holar</button>
                    </div>
                </form>
            </div>

            <div class="col bg-white p-5 rounded-end">
                <form action="../gestion.php" method="post">
                    <div class="d-grid ">
                        <button type="submit" class="btn btn-primary" value="ingresars">holar</button>
                    </div>
                </form>
            </div>



        </div>
    </div> -->








</body>

</html>