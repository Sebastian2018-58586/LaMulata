<?php
session_start();

include_once "../modelos/conexion.php";

$sentencia3 =  Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE facturacion = 0");

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
                        <h1 class="m-0">Pedidos sin Facturar</h1>
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
                        <th class="th-sm" scope="col">#Id pedido</th>
                        <th class="th-sm" scope="col">Mesa</th>
                        <th class="th-sm" scope="col">Valor</th>
                        <th class="th-sm" scope="col">Estado</th>
                        <th class="th-sm" scope="col">Estado de facturacion</th>
                        <th class="th-sm" scope="col">Facturar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
          foreach ($pedidos as $datos2) {
            if ($datos2->facturacion == 0) {
          ?>

                    <tr>
                        <td><?php echo $datos2->id_pedido  ?></td>
                        <td><?php echo $datos2->mesa  ?></td>
                        <td><?php echo $datos2->precio  ?></td>
                        <td><?php echo $datos2->estado  ?></td>
                        <td><?php echo $datos2->facturacion  ?></td>
                        <td><button type="button" class="btn btn-primary ver_pedido"
                                id_pedido="e<?php echo $datos2->id_pedido  ?>">Facturar</button></td>
                    </tr>
                    <?php
            }
          }

          ?>

                </tbody>
            </table>
        </div>


    </div><!-- /.container-fluid -->
</div>


<?php
foreach ($pedidos as $key => $datos) {
?>
<div class="e<?php echo $datos->id_pedido ?> content2">
    <div class="close-btn cerrar_pedido" id_pedido="e<?php echo $datos->id_pedido ?> content2">

    </div>
    <h3>Resumen de pedido</h3>
    <div class="input-group mb-3">
        <input type="number" id="identificacion<?php echo $key ?>" class="form-control"
            placeholder="Ingrese la cedula del cliente" aria-label="Recipient's username"
            aria-describedby="basic-addon2">

    </div>
    <div class="input-group mb-3">
        <input type="text" id="nombre<?php echo $key ?>" class="form-control"
            placeholder="Ingrese el nombre del cliente" aria-label="Recipient's username"
            aria-describedby="basic-addon2">

    </div>

    <div>

        <select class="form-select" id="pago<?php echo $key ?>" class="form-control"
            aria-label="Default select example">
            <option selected>Seleccine el método de pago</option>
            <option value="Nequi">Nequi</option>
            <option value="Tarjeta">Tarjeta</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Otro">Otro</option>
        </select>
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
    <button type="button" class="btn cerrar_pedido btn-secondary" id_pedido="e<?php echo $datos->id_pedido ?>"
        data-dismiss=" modal">Close</button>
    <button type="button" valor="<?php echo $datos->precio ?>" detalle="<?php echo $datos->id_pedido ?>"
        nombre="nombre<?php echo $key ?>" identificacion="identificacion<?php echo $key ?>"
        pago="pago<?php echo $key ?>" class="btn btn-primary despachar">Facturar Pedido</button>
</div>


<?php


}

?>

<!-- /.content -->

<style>
 /* body {} */

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
        var nombre = $(this).attr('nombre');
        var nombre_value = $("#" + nombre).val();
        var identificacion = $(this).attr('identificacion');
        var identificacion_value = $("#" + identificacion).val();
        var pago = $(this).attr('pago');
        var pago_value = $("#" + pago).val();
        var precio_value = $(this).attr('valor');
        console.log(pago_value);



        Swal.fire({
            title: '¿Desea facturar el pedido?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!'
        }).then((result) => {
            if (result.isConfirmed) {
                console.log();
                window.location.href = "ajax/facturacion-ajax.php/?id=" + detalle_id +
                    "&nombre=" + nombre_value + "&identificacion=" + identificacion_value +
                    "&pago=" + pago_value + "&precio=" + precio_value;;

                setTimeout(function() {
                    CargarContenido('vistas/facturas.php', 'content-wrapper');

                }, 3000);





            }
        })
    });


    function CargarContenido(pagina_php, contenedor) {
        $("." + contenedor).load(pagina_php);
    }


    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }


})
</script>