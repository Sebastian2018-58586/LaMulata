<?php
session_start();

include_once "../modelos/conexion.php";

$sentencia3 =  Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE facturacion = 1");

$sentencia3->execute();
$pedidos = $sentencia3->fetchAll(PDO::FETCH_OBJ);

$fecha2 = $DateAndTime = date('m', time());
$sentencia =  Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE MONTH(fecha) = $fecha2 AND YEAR(fecha) = 2022  AND facturacion = 1");
$sentencia->execute();

$pedidos2 = $sentencia->fetchAll(PDO::FETCH_OBJ);
$fecha3 = $DateAndTime = date('m', time());
$sentencia3 =  Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE MONTH(fecha) = $fecha2 - 1 AND YEAR(fecha) = 2022 AND facturacion = 1");
$sentencia3->execute();
$pedidos3 = $sentencia3->fetchAll(PDO::FETCH_OBJ);

?>


<head>
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
    
</head>


<!-- Main content -->
<div id="pedidos2" num_pedidos="<?php echo count($pedidos2) ?>" num_pedidos2="<?php echo count($pedidos3) ?>"></div>
<div class="content">
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Historial de ventas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">inicio</a></li>
              <li class="breadcrumb-item active">Reporte de ventas</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="container">
      <div style="margin-bottom:20px ;">
    <button class="exportToExcel btn btn-success">Exportar contenido de tabla</button>
    </div>
      <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead class="bg-info">
          <tr>
            <th class="th-sm" scope="col">#Id pedido</th>
            <th class="th-sm" scope="col">Mesa</th>
            <th class="th-sm" scope="col">Valor</th>
            <th class="th-sm" scope="col">Estado</th>
            <th class="th-sm" scope="col">Estado de facturacion</th>
            <th class="th-sm" scope="col">fecha</th>
            <th class="th-sm" scope="col">Hora</th>
            <th class="th-sm" scope="col">Ver factura</th>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($pedidos as $datos2) {
            if ($datos2->facturacion == 1) {
          ?>

              <tr>
                <td><?php echo $datos2->id_pedido  ?></td>
                <td><?php echo $datos2->mesa  ?></td>
                <td><?php echo $datos2->precio  ?></td>
                <td><?php echo $datos2->estado  ?></td>
                <td><?php echo "Facturado"  ?></td>
                <?php
                $dato = $datos2->fecha;
                $fecha = date('Y-m-d', strtotime($dato));
                $hora = date('H:i:s', strtotime($dato));
                ?>
                <td><?php echo $fecha  ?></td>
                <td><?php echo $hora  ?></td>
                <td><button type="button" class="btn btn-primary ver_pedido" id_pedido="e<?php echo $datos2->id_pedido  ?>">Ver factura</button></td>
              </tr>
          <?php
            }
          }

          ?>

        </tbody>
      </table>
    </div>
    <h1>Ventas del mes</h1>

<canvas id="grafica"></canvas>
<script src="../../LA_MULATA/vistas/modulos/chart.js"></script>
  
  </div><!-- /.container-fluid -->
</div>


<?php
foreach ($pedidos as $datos) {

?>
  <div class="e<?php echo $datos->id_pedido ?> content2">
    <div class="close-btn cerrar_pedido" id_pedido="e<?php echo $datos->id_pedido ?> content2">

    </div>
    <h3>Resumen de pedido</h3>
    <table class="table table-striped table-bordered table-sm">
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
    <button type="button" class="btn cerrar_pedido btn-secondary" id_pedido="e<?php echo $datos->id_pedido ?>" data-dismiss=" modal">Close</button>
    <button type="button"  valor="<?php echo $datos->precio ?>" detalle="<?php echo $datos->id_pedido ?>" nombre="<?php echo $datos->cliente ?>" identificacion="<?php echo $datos->identificacion_cliente ?>" class="btn btn-primary despachar">Ver factura</button>
  </div>


<?php


}

?>

<!-- /.content -->

<style>
 
#grafica{
  display: block;
    width: 70% !important;
    height: 400px !important;
}
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
  $(document).ready(function() {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });

  jQuery(function($) {

    $(".despachar").click(function() {


      var detalle_id = $(this).attr('detalle');
      var nombre_value = $(this).attr('nombre');
      var identificacion_value = $(this).attr('identificacion');
      var precio_value = $(this).attr('valor');
      console.log(precio_value);



      Swal.fire({
        title: '¿Desea ver la factura?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "ajax/facturacion-ajax2.php/?id=" + detalle_id + "&nombre=" + nombre_value + "&identificacion=" + identificacion_value + "&precio=" + precio_value;
          setTimeout(function() {
            CargarContenido('vistas/reporteVentas.php', 'content-wrapper');

          }, 3000);
        }
      })
    });


    function CargarContenido(pagina_php, contenedor) {
      $("." + contenedor).load(pagina_php);
    }

    $(function() {
  $(".exportToExcel").click(function(event) {
    console.log("Exporting XLS");
    $("#dtBasicExample").table2excel({
      exclude: ".excludeThisClass",
      name: $("#studentTable").data("tableName"),
      filename: "StudentTable.xls",
      preserveColors: false
    });
  });
});

  })
 
</script>

<script>
  
  function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>