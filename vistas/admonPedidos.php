<?php
session_start();

include_once "../modelos/conexion.php";

$sentencia =  Conexion::conectar()->prepare("SELECT * FROM productos");

$sentencia->execute();
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="vistas/assets/plugins/sweetalert2/sweetalert2.min.js"></script>


</head>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Administrar pedidos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">inicio</a></li>
                    <li class="breadcrumb-item active">Administrar pedidos</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">


        <!-- tabs an content -->

        <div class="container">
            <h1>Productos </h1>
            <!-- <h2><?php //echo $_SESSION['idusuario'] 
                ?></h2> -->
            <div style="display:flex">
                <div id="exTab1" style="width: 77%;" class="container">
                    <ul class="nav nav-tabs mb-3">
                        <li><a class="nav-link active" href="#333" data-toggle="tab">Home</a>
                        </li>
                        <?php
            foreach ($categorias as $datos) {
            ?>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link " href="#<?php echo $datos->idcategoriap; ?>"
                                data-toggle="tab"><?php echo $datos->nombre; ?></a>
                        </li>
                        <?php
            }
            ?>


                    </ul>

                    <div class="tab-content clearfix">
                        <?php
            foreach ($categorias as $datos2) {
            ?>
                        <div class="tab-pane" id="<?php echo $datos2->idcategoriap; ?>">
                            <div style="display: flex;flex-wrap: wrap;">
                                <?php
                  foreach ($productos as $datos) {
                    if ($datos->idcategoriap == $datos2->idcategoriap) {
                      /* var_dump($datos->idcategoriap);
                var_dump($datos2->idcategoriap); */
                  ?>
                                <div class="card" precio="<?php echo $datos->precio;  ?>"
                                    nombre="<?php echo $datos->nombre;  ?>" producto="<?php echo $datos->nombre;  ?>"
                                    producto_id="<?php echo $datos->idproducto;  ?>"
                                    style="flex-grow: 1;width: 33%; margin:20px">
                                    <!-- <img class="card-img-top" src="../../LA_MULATA/imagenes/CARNE_DESMECHADA.png" alt="Card image cap"> -->
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $datos->nombre; ?></h5>
                                        <p class="card-text"><?php echo $datos->precio ?></p>
                                        <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                    </div>

                                </div>
                                <?php
                    }
                  }
                  ?>
                            </div>
                        </div>

                        <?php  } ?>
                        <div class="tab-pane active" id="333">
                            <img src="../../LA-MULATA-main//imagenes/LOGO-com.png"
                                style="width: 100%;height: 100%; object-fit: contain;" alt="">
                        </div>
                        <!--   <div class="tab-pane" id="4444">
          <h3>We applied clearfix to the tab-content to rid of the gap between the tab and the content</h3>
        </div>
        <div class="tab-pane" id="4a">
          <h3>We use css to change the background color of the content to be equal to the tab</h3>
        </div> -->
                    </div>
                </div>
                <div class="cuenta" style="width: 27%;">
                    <div style="border: solid 1px #0000000f;">
                        <h3 style="font-size: 20px;text-align: center;">Cuenta</h3>
                    </div>
                    <ul class="list-group" style="width: 100%;">


                        <div style="display:flex;">
                            <p>Valor:</p>
                            <p>$</p>
                            <p class="precio"> 0</p>
                        </div>
                        <div>
                            <h3>Seleccionar mesa</h3>
                        </div>
                        <div style="width:50% ; margin-bottom:10px">
                            <select style="width: 100%;" class="form-select form-select-sm"
                                aria-label=".form-select-sm example">
                                <option selected value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="3">4</option>
                                <option value="3">5</option>
                                <option value="3">6</option>
                            </select>
                        </div>
                        <button class="btn btn-primary registrar">crear pedido</button>
                    </ul>
                </div>
            </div>
        </div>







        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->








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
</style>


<script>
var $jq = jQuery.noConflict();
jQuery(function($) {

    let array = [];
    let valor_total = 0;
    $(".card").click(function() {


        var producto = $(this).attr('producto');
        var producto_id = $(this).attr('producto_id');
        var precio = $(this).attr('precio');
        var nombre = $(this).attr('nombre');


        // Swal.fire({
        //   title: '¿Desea agregar el producto a la cuenta?',
        //   icon: 'warning',
        //   showCancelButton: true,
        //   confirmButtonColor: '#3085d6',
        //   cancelButtonColor: '#d33',
        //   confirmButtonText: 'Si!'
        // }).
        // then((result) => {
        // if (result.isConfirmed) {
        var valor = parseFloat($(".precio").text()) + parseFloat(precio);
        $(".precio").text(valor);
        valor_total = valor;
        console.log(valor_total);
        $(".list-group").prepend("<li class='list-group-item item'precio=" + precio + " producto_id=" +
            producto_id + ">" + producto + "</li>");
        array.push({
            id_p: producto_id,
            precio: precio,
            nombre: nombre
        });
        console.log(array);
        // Swal.fire(
        //   'Agregado',
        //   'Producto agregado correctamente',
        //   'success'
        // )
        // }
        // })
    });

    $(".registrar").click(function() {
        var mesa = $(".form-select").val();
        console.log(valor_total);
        if (valor_total == 0) {
            Swal.fire('No puede enviar una factura vacia');
        } else {

            Swal.fire({
                title: '¿Desea registrar el pedido?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        data: {
                            'array2': JSON.stringify(array),
                            'valor': valor_total,
                            'mesa': mesa,
                        }, //datos que se envian a traves de ajax
                        url: "ajax/pedidos-ajax.php", //archivo que recibe la peticion
                        type: 'post', //método de envio

                        beforeSend: function() {
                            //   $("#resultado").html("Procesando, espere por favor...");
                        },
                        success: function(
                        response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

                            // Swal.fire(
                            //   'Agregado',
                            //   'Producto agregado correctamente',
                            //   'success'
                            // )

                            CargarContenido('vistas/admonPedidos.php',
                                'content-wrapper')
                        }
                    });



                }
            })
        }


    });

    function CargarContenido(pagina_php, contenedor) {
        $("." + contenedor).load(pagina_php);
    }
    $(document).on("click", ".item", function() {

        var producto_id = $(this).attr('producto_id');
        var precio = $(this).attr('precio');
        // console.log(parseFloat(precio) +1);
        console.log(this);

        Swal.fire({
            title: '¿Desea eliminar el producto a la cuenta?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si!'
        }).
        then((result) => {
            if (result.isConfirmed) {
                $(this).remove();
                let valor = parseFloat($(".precio").text()) - parseFloat(precio);
                $(".precio").text(valor);
                valor_total = valor;

                for (var i = 0; i < array.length; i++) {
                    if (array[i]["id_p"] == producto_id) {
                        array.splice(i, 1);
                        return;
                    }
                }
                // Swal.fire(
                //   'Agregado',
                //   'Producto agregado correctamente',
                //   'success'
                // )
            }
        })





    });



});
</script>