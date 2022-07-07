<!-- Content Header (Page header) -->
<?php
include_once "../modelos/conexion.php";
date_default_timezone_set('America/Los_Angeles');
$mes = $DateAndTime = date('m', time());
$ano = $DateAndTime = date('Y', time());
$dia = $DateAndTime = date('d', time());

$sentencia =  Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE MONTH(fecha) = $mes  AND YEAR(fecha) = $ano AND DAY(fecha) = $dia  AND metodo_pago = 'Tarjeta'");
$sentencia->execute();
$pedidos = $sentencia->fetchAll(PDO::FETCH_OBJ);
$ventas_tarjeta = 0;
for ($i = 0; $i < count($pedidos); $i++) {
  var_dump("entree");
  $ventas_tarjeta = $ventas_tarjeta + $pedidos[$i]->precio;
}


$sentencia2 =  Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE MONTH(fecha) = $mes  AND YEAR(fecha) = $ano AND DAY(fecha) = $dia  AND metodo_pago = 'Efectivo'");
$sentencia2->execute();
$pedidos2 = $sentencia2->fetchAll(PDO::FETCH_OBJ);
$ventas_efectivo = 0;
for ($i = 0; $i < count($pedidos2); $i++) {
  var_dump("entree");
  $ventas_efectivo = $ventas_efectivo + $pedidos2[$i]->precio;
}
// var_dump($ventas_efectivo);


$sentencia3 =  Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE MONTH(fecha) = $mes  AND YEAR(fecha) = $ano AND DAY(fecha) = $dia  AND metodo_pago = 'Nequi'");
$sentencia3->execute();
$pedidos3 = $sentencia3->fetchAll(PDO::FETCH_OBJ);
$ventas_nequi = 0;
for ($i = 0; $i < count($pedidos3); $i++) {
  var_dump("entree");

  $ventas_nequi = $ventas_nequi + $pedidos3[$i]->precio;
}

// var_dump($ventas_nequi);


$sentencia4 =  Conexion::conectar()->prepare("SELECT * FROM pedidos WHERE MONTH(fecha) = $mes  AND YEAR(fecha) = $ano AND DAY(fecha) = $dia  AND metodo_pago = 'Otro'");
$sentencia4->execute();
$pedidos4 = $sentencia4->fetchAll(PDO::FETCH_OBJ);
$ventas_otro = 0;
for ($i = 0; $i < count($pedidos4); $i++) {
  var_dump("entree");

  $ventas_otro = $ventas_otro + $pedidos4[$i]->precio;
}

$sentencia5 =  Conexion::conectar()->prepare("SELECT * FROM base");
$sentencia5->execute();
$base = $sentencia5->fetchAll(PDO::FETCH_OBJ);
// establecer en 0 la base 

// el la tenia desctivado
if($base[0]->estado ==  "desactivo"){
  $ventas_tarjeta = 0;
  $ventas_nequi = 0;
  $ventas_efectivo = 0;
  $ventas_otro =0;
}
//  var_dump($base[0]->valor);


?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Corte del dia</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">inicio</a></li>
          <li class="breadcrumb-item active">Corte del dia</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div style="display:flex ; flex-wrap:wrap">
      <div class="card">
        <div class="card-header">
          Ventas Nequi
        </div>
        <ul class="list-group list-group-flush">
          <div class="content-info">
            <li class="list-group-item">Total</li>
            <li id="nequi" valor="<?php echo $ventas_nequi ?>" class="list-group-item"><?php echo $ventas_nequi ?></li>
          </div>

        </ul>
      </div>

      <div class="card">
        <div class="card-header">
          Efectivo
        </div>
        <ul class="list-group list-group-flush">
          <div class="content-info">
            <li class="list-group-item">Total</li>
            <li id="efectivo" valor="<?php echo $ventas_efectivo ?>" class="list-group-item"><?php echo $ventas_efectivo ?></li>
          </div>

        </ul>
      </div>

      <div class="card">
        <div class="card-header">
          Tarjeta
        </div>
        <ul class="list-group list-group-flush">
          <div class="content-info">
            <li class="list-group-item">Total</li>
            <li id="tarjeta" valor="<?php echo $ventas_tarjeta ?>" class="list-group-item"><?php echo $ventas_tarjeta ?></li>
          </div>

        </ul>
      </div>

      <div class="card">
        <div class="card-header">
          Otro
        </div>
        <ul class="list-group list-group-flush">
          <div class="content-info">
            <li class="list-group-item">Total</li>
            <li id="otro" valor="<?php echo $ventas_otro ?>" class="list-group-item"><?php echo $ventas_otro ?></li>
          </div>

        </ul>
      </div>

      <div class="card">
        <div class="card-header">
          Gastos
        </div>
        <ul class="list-group list-group-flush">
          <div class="content-info">
            <li class="list-group-item">Total</li>
            <li class="list-group-item"> <input type="text" id="gastos" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"></li>
          </div>

        </ul>
      </div>
      <div class="card">
        <div class="card-header">
          Base
        </div>
        <ul class="list-group list-group-flush">
          <div class="content-info">
            <li class="list-group-item">Total</li>
            <li class="list-group-item"> <input type="text" id="base" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" value="<?php echo $base[0]->valor ?>"></li>
          </div>

        </ul>
      </div>
  
    </div>

    <?php if($base[0]->estado ==  "desactivo") { ?>
      <div style="display:flex; justify-content: center;">
      <button disabled type="button" class="btn btn-primary">Por favor establece de nuevo la base diaria para poder realizar el corte</button>
      </div>
      <?php } else {
       ?>
    <div style="display:flex; justify-content: center;">
      <button id="terminar" type="button" class="btn btn-primary">Terminar Dia</button>
    </div>
    <?php } ?>
    
      <?php
     
     

    //  $ventas_tarjeta = 0;
    //  $ventas_nequi = 0;
    //  $ventas_efectivo = 0;
    //  $ventas_otro =0;
  ?>

      
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->




<style>
  .card {
    width: 31% !important;
    margin: 9px;
  }
</style>



<script>
  $("#terminar").click(function() {
    var nequi = $("#nequi").attr("valor");
    var efectivo = $("#efectivo").attr("valor");
    var otro = $("#otro").attr("valor");
    var tarjeta = $("#tarjeta").attr("valor");
    var gastos = $("#gastos").val();
    var base = $("#base").val();
    var total=Number(nequi) + Number(efectivo) +  Number(otro) +  Number(tarjeta) +  Number(base) -  Number(gastos);
    
      Swal.fire({
        title: '¿Desea terminar el dia con un total de:' + total,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            data: {
              'nequi': nequi,
              'efectivo': efectivo,
              'otro': otro,
              'tarjeta': tarjeta,
              'gastos': gastos,
              'base': base,
              'total': total


            }, //datos que se envian a traves de ajax
            url: "ajax/corte-ajax.php", //archivo que recibe la peticion
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

             CargarContenido('vistas/corteDia.php', 'content-wrapper')
            }
          });



        }
      })
    


  });
</script>