
<?php session_start();
    $sede = $_SESSION['idRestaurante']; ?>
<!-- CONTENT-HEADER -->
<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Administrar Materia Prima </h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>

                    <li class="breadcrumb-item active">Gestor de la creacion de la Materia prima</li>
                </ol>

            </div>
        </div>
    </div>

</section>


<!-- CONTENT -->
<section class="content">

    <div class="container-fluid">
    
    <div class="btn-agregar-categoria btnAgregar">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#modal-gestionar-producto" data-dismiss="modal"> <i class="fas fa-plus-square"></i> Agregar Materia prima</button>
        </div>

        <table id="tablamateria" class="table table-striped table-bordered nowrap" style="width:100%;" >
            <thead class="bg-info">
                <tr>
                    <!-- <td style="width:5%;">Id</td>
                    <td>nombre</td> -->
                    <!-- <td>Ruta</td> -->
                    <!-- <td style="width:15%;">Fecha</td> -->
                    <!-- <td style="width:10%;">Estado</td> -->
                    <!-- <td style="width:5%;" align="center">Id_Restaurante</td> -->
                    <td style="width:5%;" align="center">Tipo_de_materia_prima</td>
                    <td style="width:5%;"align="center">Id_materia_prima</td>
                    <td style="width:5%;"align="center">Nombre</td>
                    <!-- <td style="width:5%;"align="center">Imagen</td> -->
                    <td style="width:5%;" align="center">Cantidad</td>
                    <td style="width:5%;"align="center">Descripcion</td>
                    <td style="width:5%;"align="center">Acciones</td>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>

</section>
<!-- ./ CONTENT -->


<div class="modal fade" id="modal-gestionar-producto">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <!-- ============================================================
        =MODAL HEADER
        =============================================================== -->
            <div class="modal-header bg-info">
                <h4 class="modal-title">Gestionar las materias primas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <input type="hidden" value="<?php session_start();
                                        echo $_SESSION['idRestaurante']; ?>">
            <!-- 
            ============================================================
            =MODAL BODY
            =============================================================== -->
            <div class="modal-body">
                <div class="row">
                   
                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtNombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="txtNombre" placeholder="Inghrese la nombre">
                        </div>
                    </div> -->
                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label for="ddlEstado">Estado</label>
                            <select name="estado" id="ddlEstado" class="form-control select2bs4">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                    </div> --> 
                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label >Seleccione el tipo de materia prima </label>
                                       
                                <select name="idrestaurante" class="form-group" id="txtidrestaurante" style="width:250px ;height:37px;overflow: hidden">
                                    <?php
                                    include '../php/db.php';
                                    // $consulta = "SELECT * FROM categoriamateriaprima";
                                    // $consulta = "SELECT idrestaurante FROM restaurante WHERE idrestaurante=" .$_SESSION['idRestaurante'];

                                    // $ejecutar1 = mysqli_query($conexion1, $consulta1) or die(mysqli_error($conexion1));
                                    ?>
                                    <option>Seleccione la sede</option>
                                    <?php foreach ($ejecutar1 as $opciones1) : ?>
                                        <option value="<?php echo $opciones1['idrestaurante'] ?>"><?php echo $opciones1['nombre'] ?></option>
                                    <?php endforeach ?>
                                </select>
                           
                        </div>
                    </div> -->

                    
                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label >Seleccione la sede </label>
                                       
                                <select name="idrestaurante" class="form-group" id="txtidrestaurante" style="width:250px ;height:37px;overflow: hidden">
                                    <?php
                                    include '../php/db.php';
                                    $consulta = "SELECT * FROM restaurante WHERE idrestaurante= '1111'";
                                    $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
                                    ?>
                                    <option>Seleccione la sede</option>
                                    <?php foreach ($ejecutar as $opciones) : ?>
                                        <option value="<?php echo $opciones['idrestaurante'] ?>"><?php echo $opciones['nombre'] ?></option>
                                    <?php endforeach ?>
                                </select>
                           
                        </div>
                    </div> -->

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtidmateriaprima">Id de materiapriam</label>
                            <input type="text" class="form-control" name="idmateriaprima" id="txtidmateriaprima" placeholder="Ingrese el nombre de la categoría">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label >Tipo de materia prima </label>
                                       
                                <select name="idcategoriam" class="form-group" id="txtidcategoriam" style="width:250px ;height:37px;overflow: hidden">
                                    <?php
                                    include '../php/db.php';
                                    $consulta = "SELECT * FROM categoriamateriaprima where idrestaurante='$sede'";
                                    $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
                                    ?>
                                    <!-- <option>Seleccione el tipo de materia prima</option> -->
                                    <?php foreach ($ejecutar as $opciones) : ?>
                                        <option value="<?php echo $opciones['idcategoriam'] ?>"><?php echo $opciones['nombre'] ?></option>
                                    <?php endforeach ?>
                                </select>
                           
                        </div>
                    </div>


            
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtnombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="txtnombre" placeholder="Ingrese el nombre de la categoría">
                        </div>
                    </div>
                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtimagen">imagén</label>
                            <input type="file" class="form-control" name="imagen" id="txtimagen"
                                placeholder="Ingrese la imagén">
                        </div>
                    </div> -->
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtcantidad">Cantidad</label>
                            <input type="number" class="form-control" name="cantidad" id="txtcantidad"
                                placeholder="Ingrese el cantidad del producto">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtdescripcion">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="txtdescripcion"
                                placeholder="Ingrese la descripción">
                        </div>
                    </div>
    
                </div>
            </div>
            <!-- ============================================================
        =MODAL FOOTER
        =============================================================== -->
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btnGuardar" class="btn btn-primary">Guardar</button>
            </div>

        </div>

    </div>

</div>



<!-- ./ VENTANA MODAL PARA REGISTRO Y ACTUALIZACION -->

<script>
    $(document).ready(function() {

        var accion = "";

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        var table = $("#tablamateria").DataTable({
            "ajax": {
                "url": "ajax/materia.ajax.php",
                "type": "POST",
                "dataSrc": ""
            },
            "columnDefs": [
                // {
                // 	"targets": 4,
                // 	"sortable": false,
                // 	"render": function (data, type, full, meta){

                // 		if(data == 1){
                // 			return "<div class='bg-primary color-palette text-center'>ACTIVO</div> " 
                // 		}else{
                // 			return "<div class='bg-danger color-palette text-center'>INACTIVO</div> " 
                // 		}

                // 	}
                // },
                {
                    // "targets": 2,
                    "targets": 5,
                    "sortable": false,
                    "render": function(data, type, full, meta) {
                        return "<center>" +
                            "<button type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-gestionar-producto'> " +
                            "<i class='fas fa-pencil-alt'></i> " +
                            "</button> " +
                            "<button type='button' class='btn btn-danger btn-sm btnEliminar'> " +
                            "<i class='fas fa-trash'> </i> " +
                            "</button>" +
                            "</center>";
                    }
                }
            ],
            "columns": [
        

                // {
                //     "data": "idrestaurante"
                // },
                
                {
                    
                    "data": "idcategoriam"
                },
                {
                    "data": "idmateriaprima"
                },
                {
                    "data": "nombre"
                },
                // {
                //     "data": "imagen"
                // },
                {
                    "data": "cantidad"
                },
                {
                    "data": "descripcion"
                },
                {
                    "data": "acciones"
                }
            ],

            "language": {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "1": "Mostrar 1 fila",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio",
                            "not": "Diferente de"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío",
                            "not": "Diferente de"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con",
                            "not": "Diferente de"
                        },
                        "array": {
                            "not": "Diferente de",
                            "equals": "Igual",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "notEmpty": "No Vacío",
                            "without": "Sin"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d"
                },
                "select": {
                    "1": "%d fila seleccionada",
                    "_": "%d filas seleccionadas",
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "$d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    }
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Proximo",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "am",
                        "pm"
                    ]
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear Nuevo Registro",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar Registro",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Eliminar",
                        "title": "Eliminar Registro",
                        "submit": "Eliminar",
                        "confirm": {
                            "_": "¿Está seguro que desea eliminar %d filas?",
                            "1": "¿Está seguro que desea eliminar 1 fila?"
                        }
                    },
                    "error": {
                        "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                    },
                    "multi": {
                        "title": "Múltiples Valores",
                        "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                        "restore": "Deshacer Cambios",
                        "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                    }
                },
                "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
            },
        });

        $(".btn-agregar-categoria").on('click', function() {
            accion = "registrar";
        });

        $('#tablamateria tbody').on('click', '.btnEliminar', function() {
            var data = table.row($(this).parents('tr')).data();

            // alert(data["Id"]);

            // id que esta en naranja se trae de la taba  de a ventana 

            // var Id = data["id"];
            // var nombre = data["nombre"];

            var idrestaurante = data["idrestaurante"];
            var idmateriaprima = data["idmateriaprima"];
            var idcategoriam = data["idcategoriam"];
            var nombre = data["nombre"];
            // var imagen = data["imagen"];
            var cantidad = data["cantidad"];
            var descripcion = data["descripcion"];


            var datos = new FormData();
            datos.append('accion', "eliminar")
            datos.append('idmateriaprima', idmateriaprima);

            // datos.append('Id', Id);

            swal.fire({

                title: "¡CONFIRMACION!",
                text: "¿Estas de acuerdo en elminar la categoria " + nombre + "?" +
                    "¡Recuerda! que una vez eliminado no podras recuperarlo",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: "Sí, Eliminar",
                cancelButtonText: "Cancelar"

            }).then(resultado => {

                if (resultado.value) {

                    //LLAMADO AJAX
                    $.ajax({
                        url: "ajax/materia.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {

                            console.log(respuesta);

                            table.ajax.reload(null, false);

                            Toast.fire({
                                icon: 'success',
                                title: respuesta
                            });

                        }
                    })
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: "cancelaste la eliminacion del producto : " + nombre
                    });
                }

            })
        })

        $('#tablamateria tbody').on('click', '.btnEditar', function() {

            var data = table.row($(this).parents('tr')).data();
            accion = "actualizar";


            $("#txtidrestaurante").val(data["idrestaurante"]);
            $("#txtidmateriaprima").val(data["idmateriaprima"]);
            $("#txtidcategoriam").val(data["idcategoriam"]);
           
            // $("#txtimagen").val(data["imagen"]);
            $("#txtcantidad").val(data["cantidad"]);
            $("#txtdescripcion").val(data["descripcion"]);

            $("#txtnombre").val(data["nombre"]);

            // var datos = new FormData();
            // datos.append('accion', "eliminar")
            // datos.append('idmateriaprima', idmateriaprima);

            // datos.append('accion', "actualizar")

           




        })

        // GUARDAR LA INFORMACION DE CATEGORIA DESDE LA VENTANA MODAL
        $("#btnGuardar").on('click', function() {

             var idrestaurante = $("#txtidrestaurante").val(),
              
                // descripcion = new Date().toISOString().replace(/T/, ' ').replace(/\..+/, '');
                idmateriaprima= $("#txtidmateriaprima").val(),
                idcategoriam = $("#txtidcategoriam").val(),
                nombre = $("#txtnombre").val(),
                // imagen = $("#txtimagen").val(),
                cantidad = $("#txtcantidad").val(),
                descripcion = $("#txtdescripcion").val();
                
             var datos = new FormData();

            datos.append('idrestaurante', idrestaurante)
            datos.append('idmateriaprima', idmateriaprima)
            datos.append('idcategoriam', idcategoriam)
            datos.append('nombre', nombre)
            // datos.append('imagen', imagen)
            datos.append('cantidad', cantidad)
            datos.append('descripcion', descripcion)

            datos.append('accion', accion);

            if (nombre == "" || cantidad == "" || descripcion == "" ) {
                swal.fire({
                    title: "¡Advertencia!",
                    text: "Por favor llenar todos los campos",
                    icon: 'error',
                    cancelButtonText: "Aceptar"
                })

            } else {
            swal.fire({
                title: "¡CONFIRMAR!",
                text: "¿Está de acuerdo con registrar la categoria?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Si, deseo registrarla",
                cancelButtonText: "Cancelar"
            }).then(resultado => {
                if (resultado.value) {
                    $.ajax({
                        url: "ajax/materia.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(respuesta) {
                            console.log(respuesta);


                            table.ajax.reload(null, false);
                           

                            $("#txtidrestaurante").val("");
                            $("#txtidmateriaprima").val("");
                            $("#txtidcategoriam").val("");
                            $("#txtnombre").val("");
                            // $("#txtimagen").val("");
                            $("#txtcantidad").val("");
                            $("#txtdescripcion").val("");

                           

                            




                            // $("#ddlEstado").val([1]);
                            // ALERTAS AMIGABLESS 
                            Toast.fire({
                                icon: 'success',
                                title: respuesta
                            })


                        }


                    });

                } else {
                    Toast.fire({
                        icon: 'error',
                        title: "Cancelaste el registro de la materia prima: " + nombre
                    });
                }
            })

        }


        })


    })

    // function editarGestionar(idproducto, idmateriaprima,idpromat) {
    //     $('.modal-title').html('Editar la materia prima de los productos');
    //     $('#txtidproducto').val(idproducto).trigger('change.select2');
    //     $('#materiaPrimaMulti').css("display","none")
    //     $('#materiaPrima').css("display","block");
    //     $('#txtidmateriaprimauno').val(idmateriaprima).trigger('change.select2');
    //     $('#txtidpromat').val(idpromat)
    //     // console.log('data', idproducto, idmateriaprima)
    // }
</script>


