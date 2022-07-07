<?php
session_start();

include_once "../modelos/conexion.php";

$sentencia3 =  Conexion::conectar()->prepare("SELECT * FROM cortes");

$sentencia3->execute();
$pedidos = $sentencia3->fetchAll(PDO::FETCH_OBJ);
?>

<head>



</head>
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cortes</h1>
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
      <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead class="bg-info">
          <tr>
            <th class="th-sm" scope="col">#id corte</th>
            <th class="th-sm" scope="col">Fecha</th>
            <th class="th-sm" scope="col">Nequi</th>
            <th class="th-sm" scope="col">Efectivo</th>
            <th class="th-sm" scope="col">Tarjeta</th>
            <th class="th-sm" scope="col">Otros</th>
            <th class="th-sm" scope="col">Base</th>
            <th class="th-sm" scope="col">Gastos</th>
            <th class="th-sm" scope="col">Total</th>
          </tr>
        </thead>
        <tbody>

          <?php
          foreach ($pedidos as $datos2) {
          
          ?>

              <tr>
                <td><?php echo $datos2->id ?></td>
                <td><?php echo $datos2->fecha  ?></td>
                <td><?php echo $datos2->nequi ?></td>
                <td><?php echo $datos2->efectivo ?></td>
                <td><?php echo $datos2->tarjeta  ?></td>
                <td><?php echo $datos2->otro  ?></td>
                <td><?php echo $datos2->base  ?></td>
                <td><?php echo $datos2->gastos  ?></td>
                <td><?php echo $datos2->total  ?></td>
               
              </tr>
          <?php
            
          }

          ?>

        </tbody>
      </table>
    </div>


  </div><!-- /.container-fluid -->
</div>


<script>
 
  $(document).ready(function() {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });

  
</script>



