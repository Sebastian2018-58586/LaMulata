<?php
$idusuario = $_SESSION['idusuario'];

$consulta = "SELECT idusuario,nombre,apellido,direccion,telefono,contrasena,idrol FROM usuarios where idusuario='$idusuario'";


$resul = $conexion->query($consulta);
$row = $resul->fetch_assoc();


?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 menu_lateral">
    <!-- <a href="php/cerrar.sesion.php" class="brand-link">
        <img src="imagenes\LOGO-com.png" class="brand-image">
        <span class="" class="brand-image"><?php echo "<p>$idusuario</p>"; ?></span>
        <span class="imagenes\LOGO-com.png" class="brand-image"><?php echo "<p>$idurestaurante</p>"; ?></span>
    </a> -->

    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="imagenes\LOGO-com.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">           .</span>
    </a>

    <!-- Sidebar -->
    <!-- <div class="sidebar">
        



        >
        <nav class="mt-2 ">

            <ul class="nav nav-pills nav-sidebar nav_profile">
                <li class="nav-item">
                    <a href="php/cerrar.sesion.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Cerrar Sesion
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
       

    </div> -->
    <!-- /.sidebar -->



    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="vistas/assets/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">Luis Lozano</a>
    </div>
</div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2 ">

            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="" class="nav-link">
                        <!-- onclick="CargarContenido('vistas/Sedes.php','content-wrapper')"> -->

                        <i class="nav-icon fas fa-home"></i>
                        <p>Sede</p>
                    </a>


                <!-- Gestion de Empleados -->

<!-- 
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Gestion de Empleados
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/admonEmpleados.php','content-wrapper')">
                                <i class="fas fa-user-edit nav-icon"></i>
                                <p>Administrar empleados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/asignarTurnos.php','content-wrapper')">
                                <i class="far fa-calendar-alt nav-icon"></i>
                                <p>Asignar turnos</p>
                            </a>
                        </li>

                    </ul>
                </li> -->

                     <!-- gestion de sedes  -->

                <?php  if ($row['idrol'] == '1111' ) {?>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Gestión de sedes
                            <i class="right fas fa-angle-left"></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/admonSede.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrar</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php }?>

                <!-- gestionar Empleados  -->
                <?php  if ($row['idrol'] == '1111') {?>
                <!-- Gestion de Empleados -->
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Gestión de Empleados
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/admonEmpleados.php','content-wrapper')">
                                <i class="fas fa-user-edit nav-icon"></i>
                                <p>Administrar empleados</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/asignarTurnos.php','content-wrapper')">
                                <i class="far fa-calendar-alt nav-icon"></i>
                                <p>Asignar turnos</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <?php }?>


                <?php  if ($row['idrol'] == '1111') {?>
                <!-- gestionar usuarios  -->
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        
                        <i class="fas fa-user-check"></i>
                        <p>
                            Gestión de Usuarios
                            <i class="right fas fa-angle-left"></i>
                            
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/admonUsuarios.php','content-wrapper')">
                                <i class="fas fa-user-edit nav-icon"></i>
                                <p>Administrar usuarios</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php }?>
            </ul>


            <ul class="nav nav-pills nav-sidebar nav_profile">
                <li class="nav-item-active">
                    <a href="php/cerrar.sesion.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt" style="color:red"></i>
                        <p>
                            Cerrar Sesión
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

    </div>
</aside>