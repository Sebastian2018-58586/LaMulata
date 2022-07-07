<!-- Content Header (Page header) -->

<?php

// session_start();

$idusuario = $_SESSION['idusuario'];

$sede = $_SESSION["idRestaurante"];

$conexion = mysqli_connect("localhost", "root", "", "lamulata1");

$consulta = "SELECT idusuario,nombre,apellido,direccion,telefono,contrasena,idrol FROM usuarios where idusuario='$idusuario'";

$consulta1 = "SELECT idrestaurante,nombre FROM restaurante where idrestaurante='$sede'";

// $resultado = mysqli_query($conexion, $consulta);
// $filas = mysqli_num_rows($resultado)hsjhsjsj;

$resul = $conexion->query($consulta);
$row = $resul->fetch_assoc();


$resul1 = $conexion->query($consulta1);
$row1 = $resul1->fetch_assoc();


// include_once "../modelos/conexion.php";
$sentencia = "SELECT * FROM base";
$resul1 = $conexion->query($sentencia);


// $sentencia->execute();
$resul2 = $resul1->fetch_assoc();
// var_dump($resul2);

?>



<head>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <style>
        .content2 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;

    text-align: center;
    background-color: #e8eae6;
    box-sizing: border-box;
    padding: 10px;
    z-index: 100;
    display: none;
    /* /to hide popup initially/ */
  }
  .close-btn {
    position: absolute;
    right: 20px;
    top: 15px;
    background-color: black;
    color: white;
    border-radius: 50%;
    padding: 4px;
  }
    </style>
</head>


<div class="content2">
    <div class="close-btn cerrar_pedido" id_pedido="content2">

    </div>
    <div>
        <h3>Establezca el valor nuevo de la base</h3>
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" id="base" aria-label="Default" aria-describedby="inputGroup-sizing-default">

    </div>
    <div style="display:flex; align-items: center;justify-content: center;">
        <button type="button" id="update_base" class="btn btn-primary">Establecer base</button>
        <button type="button" class="btn cerrar_pedido btn-secondary">Close</button>
    </div>
    <div class="input-group mb-3">


    </div>

    <div>

    </div>



</div>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- gris  -->

                <!-- .utf8_decode($row['nombre']) -->
                <!-- blanco  -->
                <button type="button" class="btn btn-block btn-default btn-lg">
                    <?php echo 'Bienenido/a   '   . utf8_decode($row['nombre']) ?>
                    <?php echo 'a la sede :   ' . utf8_decode($row1['nombre']) ?>

                </button>

                <!-- amarillo -->
                <!-- <button type="button" class="btn btn-block btn-warning btn-lg">
                <?php echo 'Bienenido a la sede :   ' . utf8_decode($row1['nombre']) ?> 
                </button> -->

            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#"> <?php echo utf8_decode($row1['nombre']) ?> </a></li>
                    <li class="breadcrumb-item active">Inicio</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- /.content de los bloques  -->
<br>

<!-- columana de perfil  -->
<!-- <div class="row" style="ruby-align: center;">
    <div class="col">
        <div class="icon">

            <i class="fas fa-user" style="width: 80px"></i>

        </div>
    </div>
    <div class="col-lg-8 col-6">

        <div class="card card-widget widget-user-2">

            <div class="widget-user-header bg-warning">
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="../dist/img/user7-128x128.jpg" alt="Avatar del usuario"
                        _mstalt="323752">
                </div>

                <h3 class="widget-user-username" _msthash="2759588" _msttexthash="273013">
                    <?php echo utf8_decode($row['nombre']); ?></h3>
                <h5 class="widget-user-desc" _msthash="2759926" _msttexthash="523796">
                    <?php echo  utf8_decode($row['apellido']); ?></h5>
            </div>
            <div class="card-footer p-0">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <font _mstmutation="1" _msthash="3512015" _msttexthash="139971">
                                <?php
                                echo '  Identificacion: ' . utf8_decode($row['idusuario']); ?> </font><span
                                class="float-right badge bg-primary" _msthash="4155567" _msttexthash="9737"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <font _mstmutation="1" _msthash="3512197" _msttexthash="76011">
                                <?php echo 'Direccion: ' . utf8_decode($row['direccion']); ?></font><span
                                class="float-right badge bg-info" _msthash="4155840" _msttexthash="4823"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <font _mstmutation="1" _msthash="3512379" _msttexthash="460876">
                                <?php echo 'Telefono: ' . utf8_decode($row['telefono']); ?>
                            </font><span class="float-right badge bg-success" _msthash="4156113"
                                _msttexthash="9659"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <font _mstmutation="1" _msthash="3512379" _msttexthash="460876">
                                <?php echo 'Idrol: ' . utf8_decode($row['idrol']); ?>
                            </font><span class="float-right badge bg-success" _msthash="4156113"
                                _msttexthash="9659"></span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    </div>

</div> -->



<div class="row">

    <div class="col-lg-3 col-4">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3> <?php
                        $conexion = mysqli_connect("localhost", "root", "", "lamulata1");

                        $consulta = "SELECT*FROM productos where idrestaurante='$sede'";
                        $resultado = mysqli_query($conexion, $consulta);
                        $filas = mysqli_num_rows($resultado);
                        echo $filas ?></h3>
                <p>Número de prodcutos</p>
            </div>
            <div class="icon">
                <!-- <i class="fas-solid fa-cart-circle-plus"></i> -->
                <!-- <i class="fa-solid fa-cart-circle-plus"></i> -->
                <i class="fas fa-user"></i>

            </div>
            <a href="#" class="small-box-footer">Productos<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-success">
            <div class="inner">
                <h3>

                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "lamulata1");

                    $consulta = "SELECT*FROM empleados";
                    $resultado = mysqli_query($conexion, $consulta);
                    $filas = mysqli_num_rows($resultado);
                    echo $filas ?>


                    <sup style="font-size: 20px"></sup>
                </h3>
                <p>Número de empleados</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">Empleados<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "lamulata1");

                    $consulta = "SELECT*FROM pedidos where estado= 'pendiente'";
                    $resultado = mysqli_query($conexion, $consulta);
                    $filas = mysqli_num_rows($resultado);
                    echo $filas ?>
                </h3>
                <p>Número de pedidos pendientes </p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">Pedidos pendientes <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>
                    <?php
                    $conexion = mysqli_connect("localhost", "root", "", "lamulata1");

                    $consulta = "SELECT*FROM base ";
                    $resultado = mysqli_query($conexion, $consulta);
                    $filas = mysqli_num_rows($resultado);
                    echo $filas ?>

                </h3>
                <p>Número de facturas</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">Facturas <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <h1 id="m" modal="<?php echo $resul2["estado"]; ?>"></h1>

</div>



<script>
    var estado=$("#m").attr("modal");
    console.log(estado);
    if(estado != "activa"){
        $(".content2").toggle();

    }

  
    $(".cerrar_pedido").click(function() {
        $(".content2").toggle();
    });

    $("#update_base").click(function() {
        var base= $("#base").val();
        console.log(base);

        Swal.fire({
        title: '¿Desea actualizar la base?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
        data: {
          'base': base,
          
        }, //datos que se envian a traves de ajax
        url: "ajax/update-base.php", //archivo que recibe la peticion
        type: 'post', //método de envio

        beforeSend: function() {
          //   $("#resultado").html("Procesando, espere por favor...");
        },
        success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
          
          Swal.fire(
            'Agregado',
            'Producto agregado correctamente',
            'success'
          )
       
          location.reload();
        }
      });

         
        
        }
      })


        });
</script>

<!-- editor -->


<!-- estadisticas  -->