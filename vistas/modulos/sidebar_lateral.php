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
        <span class="imagenes\LOGO-com.png" class="brand-image"><?php echo "<p>$idusuario</p>"; ?></span>
        <span class="imagenes\LOGO-com.png" class="brand-image"><?php echo "<p>$idrestaurante</p>"; ?></span>
    </a> -->

    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="imagenes\LOGO-com.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8;">
        <span class="brand-text font-weight-light">      .</span>
    </a>

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
                    <a href="./gestion.php" class="nav-link">
                        <!-- onclick="CargarContenido('vistas/plantilla.php','content-wrapper')">  -->

                        <i class="nav-icon fas fa-home"></i>
                        <p>Panel</p>
                    </a>

                    <!-- gestionar sedes -->


                </li>

                <!-- gestion de sedes  -->
                <!-- <?php  if ($row['idrol'] == '1111' ) {?>
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
                <?php }?> -->

                <?php  if ($row['idrol'] == '1111') {?>
                <!-- Gestion de Inventario -->
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                    <i class="fas fa-clipboard-list"></i>
                        <p>
                            <!-- <?php echo utf8_decode($row['idrol']); ?> -->
                            Gestión de inventario

                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link "
                                onclick="CargarContenido('vistas/admonCatemateriaprima.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categoria inventario</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link "
                                onclick="CargarContenido('vistas/admonMateriaprima.php','content-wrapper')">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrar inventario</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link "
                                onclick="CargarContenido('vistas/admonProducto_materiap.php','content-wrapper')">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Asignar invetario</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/admonMateriaprima.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte de inventario</p>
                            </a>
                        </li> -->
                    </ul>
                </li>
                <?php }?>


                <?php  if ($row['idrol'] == '1111') {?>
                <!-- gestionar productos  -->
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                    <i class="fas fa-shopping-cart"></i>
                        <p>
                            Gestión de Productos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/admonCategproducto.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrar categorias </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link "
                                onclick="CargarContenido('vistas/Productos.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrar productos</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <?php }?>


              


                
                <!-- Gestion de Pedidos -->
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                    <i class="fas fa-notes-medical"></i>>
                        <p>
                            Gestión de Pedidos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/admonPedidos.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Administrar pedidos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/pedidosRealizados.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pedidos realizados</p>
                            </a>
                        </li>
                    </ul>
                </li>
               



                <?php  if ($row['idrol'] == '3333' || $row['idrol'] == '1111') {?>
                <!-- Facturacion -->
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                    <i class="fas fa-dollar-sign"></i>
                        <p>
                            Facturación
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/facturas.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Facturas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/reporteVentas.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Reporte de ventas</p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a style="cursor: pointer;" class="nav-link"
                                onclick="CargarContenido('vistas/corteDia.php','content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Corte del dia</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php }?>


            </ul>

            </ul>

            <!-- cerrar sesion -->
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
    <!-- /.sidebar -->
</aside>