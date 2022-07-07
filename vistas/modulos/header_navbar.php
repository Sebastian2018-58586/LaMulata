 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">

     <!-- boton para ocultar navar -->
     <ul class="navbar-nav">

         <li class="nav-item">

             <a class="nav-link" data-widget="pushmenu" href="#"  role="button"><i class="fas fa-bars" style="color:white"></i></a>

         </li>

     </ul>


     <!-- Right navbar links -->

     <ul class="navbar-nav ml-auto">
         <!-- Messages Dropdown Menu -->


         <!-- Notifications Dropdown Menu -->
         <li class="nav-item dropdown">

             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="fas fa-user" style="color: white;"></i>
             </a>

             <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                 <span class="dropdown-item dropdown-header">Configuración</span>

                 <div class="dropdown-divider"></div>

                
                 
                 <!-- seleccionar sede  -->
                 <a href="../LA-MULATA-main/seleccionSede.php" class="dropdown-item">
                    
                 <i class="nav-icon fas fa-home"></i> Seleccionar sede 
                     <!-- <span class="float-right text-muted text-sm">3 mins</span> -->
                 </a>

                 <div class="dropdown-divider"></div>

                 <a href="php/cerrar.sesion.php" class="dropdown-item">
                     <i class="fas fa-users mr-2"></i> Cerrar sesión 
                     <!-- <span class="float-right text-muted text-sm">12 hours</span> -->
                 </a>

                 <div class="dropdown-divider"></div>

    
                 <!-- <a href="#" class="dropdown-item dropdown-footer">ver más notificaciones</a> -->

             </div>

         </li>


         <!-- maximizar pantalla -->

         <li class="nav-item">
             <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                 <i class="fas fa-expand-arrows-alt" style="color:white"></i>
             </a>
         </li>

     </ul>

 </nav>
 <!-- /.navbar -->