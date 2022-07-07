<?php

session_start();
$idusuario = $_SESSION['idusuario'];
// $idurestaurante = $_SESSION['idurestaurante'];

if (!isset($idusuario)) {

    header("location: HTML/login.html");
} else {

    $conexion = mysqli_connect("localhost", "root", "", "lamulata1");
    // $consulta="SELECT*FROM usuarios where idusuario='$idusuario' and contrasena='$contrasena'";

    $consulta = "SELECT nombre FROM usuarios WHERE idusuario = '$idusuario'";
    $resultado = mysqli_query($conexion, $consulta);
    $filas = mysqli_num_rows($resultado);
}


?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LA MULATA ADMINISTRADOR</title>

    <link rel="shortcut icon" href="imagenes\LOGO-com.png" type="image/x-icon">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <!-- <link rel="stylesheet" href="vistas/assets/plugins/fontawesome-free/css/all.min.css"> -->
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.min.css"> -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="vistas/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/assets/dist/js/adminlte.min.js"></script>


    <!-- aparte de todo  -->

    <!-- CSS STYLES -->
    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->


    <!-- IMAGENES Font Awesome -->
    <link rel="stylesheet" href="vistas/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- ESTILO DE TODO  EL ADMI -->
    <link rel="stylesheet" href="vistas/assets/dist/css/adminlte.css">

    <link rel="stylesheet" href="vistas/assets/dist/css/index.css">


    <!-- DataTabes CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

    <!-- SweetAlert2 ALERTAS  -->
    <link rel="stylesheet" href="vistas/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->


    <!-- SCRIPT -->
    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->

    <!-- jQuery -->
    <script src="vistas/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="vistas/assets/plugins/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- AdminLTE App -->
    <script src="vistas/assets/dist/js/adminlte.js"></script>

    <!-- Datatable js -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="vistas/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->

    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>


    <style>
    :root {
        --amarillo: #ffc107;
        --negro: #000;
        /* --gris: #626C7a; */
        --gris: #333;
        --verde: #089f2a;
        --blanco: #FFFF;
        --verdeclaro: #089f2a;
    }

    /* color de las tablas  */
    .bg-info {
        background-color: var(--gris);
    }

    .btn-info:hover {
        color: #fff;
        background-color: var(--gris);
        border-color: var(--gris);
    }

    [class*="sidebar-dark-"] .sidebar a {
        color: var(--blanco);
    }

    [class*="sidebar-dark-"] {
        background-color: var(--negro);
    }

    .navbar-white {
        background-color: var(--negro);
        color: #1f2d3d;
    }

    /* boton de de agregar  */
    .btn-info {
        color: var(--blanco);
        background-color: var(--verdeclaro);
        border-color: var(--verdeclaro);
        box-shadow: none;
    }

    .btn-info:hover {
        color: var(--blanco);
        background-color: var(--verde);
        border-color: var(--verde);
    }


    /* amarillo el sider */
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
    .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
        background-color: var(--gris);
        color: var(--blanco);
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link {
        background-color: var(--amarillo);
        color: var(--negro);
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active:hover {
        background-color: var(--amarillo);
        color: var(--negro);
    }

    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link {
        background-color: var(--negro);
        color: var(--blanco);
    }

    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link:hover {
        background-color: var(--amarillo);
        color: var(--negro);
    }


    .nav-treeview>.nav-item>.nav-link.active:hover {
        background-color: var(--amarillo);
        ;
        color: var(--amarillo);
    }

    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link.active,
    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link.active:hover,
    [class*="sidebar-dark-"] .nav-treeview>.nav-item>.nav-link.active:hover {
        background-color: var(--blanco);
        color: var(--amarillo);
    }

    /* boton de apagar  */
    .nav-sidebar .nav-item>.nav-link {
        position: relative;
        /* background-color: var(--gris); */
        color: var(--blanco);
    }

    .nav-sidebar .nav-item>.nav-link:hover {
        position: relative;
        /* background-color: var(--gris); */
        color: var(--blanco);
    }
    </style>

    <!-- confirmacion de campos  -->
    <link rel="stylesheet" href="http://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!-- <script src="../js/formulario.js"></script>
 <script>
    bootstrapValidate()
 </script> -->


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
        // include "modulos/navbar.php";
        include "modulos/header_navbar.php";
        include "modulos/sidebar_lateral.php";

        // include "modulos/aside.php";
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">



            <?php
            
            // $idusuario = $_SESSION['idusuario'];

            include "panel.php" ?>
        </div>
        <!-- /.content-wrapper -->

        <?php include "modulos/footer.php"; ?>

    </div>
    <!-- ./wrapper -->

    <script>
    function CargarContenido(pagina_php, contenedor) {
        $("." + contenedor).load(pagina_php);
    }
    </script>

</body>

</html>