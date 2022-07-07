<?php

ob_start();
$id=$_REQUEST["id"];
$nombre=$_REQUEST["nombre"];
$identificacion=$_REQUEST["identificacion"];
$pago=$_REQUEST["pago"];
$precio=$_REQUEST["precio"];
?>
<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Reporte de ventas</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
              <li class="breadcrumb-item active">Factura</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    </div>





    <!-- Main content -->

    <?php
      include_once "../modelos/conexion.php";
      $sentencia2 =  Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE id_pedido = " . $id );
      $sentencia2->execute();
      $pedido = $sentencia2->fetchAll(PDO::FETCH_OBJ);
      $sentencia3 =  Conexion::conectar()->prepare("SELECT * FROM detalle_pedido WHERE id_pedido = " . $id );
      $sentencia3->execute();

      $sentencia4 =  Conexion::conectar()->prepare("UPDATE pedidos SET facturacion='1', cliente= '$nombre' , identificacion_cliente= '$identificacion', metodo_pago= '$pago' WHERE id_pedido= " . $id );
      $sentencia4->execute();
      
      $detalles = $sentencia3->fetchAll(PDO::FETCH_OBJ);


     
        foreach ($detalles as $key => $value) {
         
          $materias = Conexion::conectar()->prepare("SELECT DISTINCT materiaprima.idmateriaprima,materiaprima.cantidad,materiaprima.cantidad_asoc , productomateriaprima.idproducto FROM materiaprima INNER JOIN  productomateriaprima ON productomateriaprima.idmateriaprima = materiaprima.idmateriaprima WHERE productomateriaprima.idproducto = $value->id_producto");
          $materias->execute();

          $detalles_mat = $materias->fetchAll(PDO::FETCH_OBJ);

          foreach ($detalles_mat as $key => $mat) {

            $materiaprima=  Conexion::conectar()->prepare("SELECT cantidad,cantidad_asoc FROM materiaprima WHERE idmateriaprima = $mat->idmateriaprima");
            $materiaprima->execute();
          
            $matp =  $materiaprima->fetch();
		        $cant =   $matp['cantidad']-$matp['cantidad_asoc'];

            $matprActualizar = Conexion::conectar()->prepare("UPDATE materiaprima SET cantidad =  $cant WHERE idmateriaprima =$mat->idmateriaprima");
            $matprActualizar->execute();
            
          }

        }
  
      


   

      ?>
    <div class="content">
      <div class="container-fluid">

      <div class="content2">
    <div id_pedido="content2">

    </div>
    <h3>Resumen de pedido</h3>
    <div>
    <h3>Cliente: <?php echo " " . $nombre ?></h3>
    <h3>Identificacion: <?php echo " " . $identificacion ?></h3>
  
  </div>
    <table class="table table-striped table-bordered table-sm">
      <thead>
        <tr>

          <th scope="col">Id del producto</th>
          <th scope="col">Nombre del producto</th>
          <th scope="col">Valor del producto</th>
        </tr>
      </thead>
      <?php
   

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
    <h1>Precio final: <?php echo $precio ?></h1>
  </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <?php

   $html = ob_get_clean();
  //echo $html;

  require_once '../libreria_pdf/dompdf/autoload.inc.php';
  use Dompdf\Dompdf;
  $domppdf = new Dompdf();
  $options = $domppdf->getOptions();
  $options->set(array('isRemoteEnabled' => true));
  $domppdf->setOptions($options);

  $domppdf->loadHtml($html);
  $domppdf->setPaper('letter');
  $domppdf->render();
  $domppdf->stream("archivo_pdf", array("Attachment" => true));
 
?>