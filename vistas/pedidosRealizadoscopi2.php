
<?php
session_start();

include_once "../modelos/conexion.php";

// ---------------------------- Viejo
// $sentencia =  Conexion::conectar()->prepare("SELECT * FROM pedidos");


// ---------------------------- nuevo
date_default_timezone_set('America/Los_Angeles');
$mes = $DateAndTime = date('m', time());
$ano = $DateAndTime = date('Y', time());
$dia = $DateAndTime = date('d', time());
$sentencia =  Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE MONTH(fecha) = $mes  AND YEAR(fecha) = $ano AND DAY(fecha) = $dia");

// -------------------------------------
$sentencia->execute();
$pedidos = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia2 =  Conexion::conectar()->prepare("SELECT * FROM categoriaproductos");

$sentencia2->execute();
$categorias = $sentencia2->fetchAll(PDO::FETCH_OBJ);
//print_r($categorias);

?>

<head>

  
   <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10/jquery.min.js"></script> -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

      <script src="vistas/assets/plugins/jquery/jquery.min.js"></script>
      <!-- Bootstrap 4 -->
    
      <!-- AdminLTE App -->
      <script src="vistas/assets/dist/js/adminlte.js"></script>
      
      <!-- Datatable js -->
      <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"defer></script>
      <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>    
      <!-- SweetAlert2 -->
      <script src="vistas/assets/plugins/sweetalert2/sweetalert2.min.js"></script>
        
</head>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Pedidos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">inicio</a></li>
          <li class="breadcrumb-item active">Pedidos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">


        <!-- tabs an content -->

        <div class="container">
          <h1>Pedidos </h1>
          <div id="exTab1" style="width: 100%;" class="container">
            <ul class="nav nav-tabs mb-3">

              <li class="nav-item" role="presentation">
                <a class="nav-link active " href="#33" data-toggle="tab">Home</a>
              </li>

              <li><a class="nav-link" href="#123" data-toggle="tab">Pedidos</a>
              </li>

              <li><a class="nav-link" href="#321" data-toggle="tab">Pedidos Despachados</a>
              </li>

            </ul>

            <div class="tab-content clearfix">
              <div class="tab-pane" id="123">
                <div style="display: flex;flex-wrap: wrap;">
                  <?php
                  foreach ($pedidos as $datos) {
                    if ($datos->estado == "Pendiente") {

                  ?>
                      <div class="card" style="width: 250px; margin:20px">
                        <img class="card-img-top" src="../../LA_MULATA/imagenes/pizza.jpg" alt="Card image cap">
                        <div class="card-body">
                          <div style="display:flex ;">
                          <h5 class="card-title">Mesa Numero:</h5>
                          <h5 class="card-title"><?php echo " " . $datos->mesa ?></h5>
                          </div>
                          <div style="display:flex ;">
                          <p>Valor Total:$</p>
                          <p class="card-text"><?php echo " " . $datos->precio ?></p>
                          </div>
                          <button type="button" class="btn btn-primary ver_pedido" data-toggle="modal" id_pedido="f<?php echo $datos->id_pedido  ?>" data-target="#f<?php  echo $datos->id_pedido ?>">
                            Ver pedido
                          </button>
                        </div>
                      </div>


                     <!--  <div class="e<?php // echo $datos->id_pedido ?> content2">
                        <div class="close-btn cerrar_pedido" id_pedido="e<?php // echo $datos->id_pedido ?> content2">

                        </div>
                        <h3>Resumen de pedido</h3>
                        <table class="table table">
                          <thead>
                            <tr>

                              <th scope="col">Id del producto</th>
                              <th scope="col">Nombre del producto</th>
                              <th scope="col">Valor del producto</th>
                            </tr>
                          </thead>
                          <?php
                         /*  $sentencia3 =  Conexion::conectar()->prepare("SELECT * FROM detalle_pedido WHERE id_pedido = " . $datos->id_pedido);

                          $sentencia3->execute();
                          $detalles = $sentencia3->fetchAll(PDO::FETCH_OBJ); */

                          ?>
                          <tbody>
                            <?php
                           // for ($i = 0; $i < count($detalles); $i++) {

                            ?>
                              <tr>

                                <td><?php // echo $detalles[$i]->id_producto ?></td>
                                <td><?php // echo $detalles[$i]->nombre ?></td>
                                <td><?php // echo $detalles[$i]->precio ?></td>
                              </tr>
                            <?php
                           // }
                            ?>
                          </tbody>
                        </table>
                        <button type="button" class="btn cerrar_pedido btn-secondary" id_pedido="e<?php // echo $datos->id_pedido ?> data-dismiss="modal">Close</button>
                        <button type="button" detalle="<?php // echo $datos->id_pedido ?>" class="btn btn-primary despachar">Despachar Pedido</button>
                      </div> -->



                      <div class="modal fade" id="f<?php echo $datos->id_pedido  ?>" tabindex="-1" role="dialog" aria-labelledby="f<?php echo $datos->id_pedido  ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="f<?php echo $datos->id_pedido ?>">Resumen del pedido</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table class="table table">
                                <thead>
                                  <tr>

                                    <th scope="col">Id del producto</th>
                                    <th scope="col">Nombre del producto</th>
                                    <th scope="col">Valor del producto</th>
                                  </tr>
                                </thead>
                                <?php
                                $sentencia3 =  Conexion::conectar()->prepare("SELECT * FROM detalle_pedido WHERE id_pedido = " . $datos->id_pedido);

                                $sentencia3->execute();
                                $detalles = $sentencia3->fetchAll(PDO::FETCH_OBJ);

                                $sentencia3 =  Conexion::conectar()->prepare("SELECT * FROM detalle_pedido WHERE id_pedido = " . $datos->id_pedido);

                                $sentencia3->execute();
                                $detalles = $sentencia3->fetchAll(PDO::FETCH_OBJ);



                                ?>
                                <tbody>
                                  <?php
                                  for ($i = 0; $i < count($detalles); $i++) {
                                  ?>
                                    <tr>
                                      <td><?php echo $detalles[$i]->id_producto ?></td>
                                      <td><?php echo $detalles[$i]->nombre ?></td>
                                      <td><?php echo $detalles[$i]->precio ?></td>
                                    </tr>
                                  <?php
                                  
                                }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn cerrar_pedido btn-secondary" id_pedido="f<?php echo $datos->id_pedido ?>" data-dismiss="modal">Close</button>
                        <button type="button" detalle="<?php echo $datos->id_pedido ?>" class="btn btn-primary despachar">Despachar Pedido</button>
                            </div>
                          </div>
                        </div>
                      </div>



                  <?php
                    }
                  }
                  ?>
                </div>
              </div>

              <div class="tab-pane" id="321">
                <div style="display: flex;flex-wrap: wrap;">
                  <?php
                  foreach ($pedidos as $datos) {
                    if ($datos->estado == "Despachado") {

                  ?>
                      <div class="card" style="width: 250px; margin:20px">
                        <img class="card-img-top" src="../../LA_MULATA/imagenes/pizza.jpg" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $datos->mesa ?></h5>
                          <p class="card-text"><?php echo $datos->precio ?></p>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#e<?php echo $datos->id_pedido  ?>">
                            Ver pedido
                          </button>
                        </div>
                      </div>

                      <div class="modal fade" id="e<?php echo $datos->id_pedido  ?>" tabindex="-1" role="dialog" aria-labelledby="e<?php echo $datos->id_pedido  ?>" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="e<?php echo $datos->id_pedido ?>">Resumen del pedido</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table class="table table">
                                <thead>
                                  <tr>

                                    <th scope="col">Id del producto</th>
                                    <th scope="col">Nombre del producto</th>
                                    <th scope="col">Valor del producto</th>
                                  </tr>
                                </thead>
                                <?php
                                $sentencia3 =  Conexion::conectar()->prepare("SELECT * FROM detalle_pedido WHERE id_pedido = " . $datos->id_pedido);

                                $sentencia3->execute();
                                $detalles = $sentencia3->fetchAll(PDO::FETCH_OBJ);

                                ?>
                                <tbody>
                                  <?php
                                  for ($i = 0; $i < count($detalles); $i++) {

                                  ?>
                                    <tr>

                                      <td><?php echo $detalles[$i]->id_producto ?></td>
                                      <td><?php echo $detalles[$i]->nombre ?></td>
                                      <td><?php echo $detalles[$i]->precio ?></td>
                                    </tr>
                                  <?php
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>


                  <?php
                    }
                  }
                  ?>
                </div>
              </div>

              <div class="tab-pane active" id="33">
                <img src="../../LA_MULATA//imagenes/Logo-sin.png" style=" object-fit: contain;" alt="">
              </div>
            </div>

          </div>



          <!-- div containing the popup -->



        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
      <style>
        body {}

        #exTab1 .tab-content {

          background-color: #33455417;
          padding: 5px 15px;
        }

        #exTab2 h3 {
          color: white;
          background-color: #33455417;
          padding: 5px 15px;
        }

        /* remove border radius for the tab */

        #exTab1 .nav-pills>li>a {
          border-radius: 0;
        }

        /* change border radius for the tab , apply corners on top*/

        #exTab3 .nav-pills>li>a {
          border-radius: 4px 4px 0 0;
        }

        #exTab3 .tab-content {
          color: white;
          background-color: #428bca;
          padding: 5px 15px;
        }

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
          /*to hide popup initially*/
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



      <script>
        var $jq = jQuery.noConflict();
        $(".ver_pedido").click(function() {
          var clase = $(this).attr('id_pedido');
          $("." + clase).toggle();
          console.log(clase);

        });
        $(".cerrar_pedido").click(function() {
          var clase = $(this).attr('id_pedido').split(' ')[0];

          console.log(clase);
          $("." + clase).hide();

        });
        jQuery(function($) {
          function togglePopup() {
            var clase = $(this).attr('id_pedido');
            $("e" + "." + clase).toggle();
            console.log(clase);
          }
          $(".despachar").click(function() {


            var detalle_id = $(this).attr('detalle');
            console.log(detalle_id);



            Swal.fire({
              title: '¿Desea despachar el pedido?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  data: {
                    'detalle': detalle_id,
                  }, //datos que se envian a traves de ajax
                  url: "ajax/estado-ajax.php", //archivo que recibe la peticion
                  type: 'post', //método de envio

                  beforeSend: function() {
                    //   $("#resultado").html("Procesando, espere por favor...");
                  },
                  success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    if (response == "true") {
                      console.log("hola hp");
                      console.log(response);
                      Swal.fire(
                        'Despachado',
                        'Producto depachado correctamente',
                        'success'
                      )

                      CargarContenido('vistas/pedidosRealizados.php', 'content-wrapper');
                      $('.modal-backdrop').hide();
                      $("body").removeClass( "modal-open" )

                    }
                  }
                });

              }
            })
          });







        });

        function CargarContenido(pagina_php, contenedor) {
          $("." + contenedor).load(pagina_php);
        }
      </script>