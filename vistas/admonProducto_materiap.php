<!-- CONTENT-HEADER -->
<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Administrar asociaciones de producto con materia prima</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>

                    <li class="breadcrumb-item active">Gestor de materia prima</li>
                </ol>

            </div>
        </div>
    </div>

</section>


<!-- CONTENT -->
<section class="content">

    <div class="container-fluid">

        <div class="btn-agregar-categoria btnAgregar">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal" data-target="#modal-gestionar-producto" data-dismiss="modal"> <i class="fas fa-plus-square"></i> Agregar asociación</button>
        </div>

        <table id="tablaCategproducto" class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead class="bg-info">
                <tr>
                    <!-- <td style="width:5%;">Id</td>
                    <td>nombre</td> -->
                    <!-- <td>Ruta</td> -->
                    <!-- <td style="width:15%;">Fecha</td> -->
                    <!-- <td style="width:10%;">Estado</td> -->
                    <td style="width:5%;">idpromat</td>
                    <td style="width:5%;">idproducto</td>
                    <td style="width:5%;">idmateriaprima</td>
                    <td style="width:5%;">Acciones</td>


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
                <h4 class="modal-title">Crear la materia prima de los productos </h4>
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

                    <!-- <div class="col-sm-6">
                        <div class="form-group">
                            <label for="txtidpromat">id promat</label>
                          
                        </div>
                    </div> -->
                    <input type="hidden" class="form-control" id="txtidpromat">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Seleccione el producto</label>

                            <select name="idproducto" class="form-group select2" id="txtidproducto" style="width:250px ;height:37px;overflow: hidden">
                                <?php
                                include '../php/db.php';
                                session_start();
                                $consulta = "SELECT * FROM productos WHERE idrestaurante =" . $_SESSION['idRestaurante'];
                                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
                                ?>
                                <option></option>
                                <?php foreach ($ejecutar as $opciones) : ?>
                                    <option value="<?php echo $opciones['idproducto'] ?>"><?php echo $opciones['nombre'] ?></option>
                                <?php endforeach ?>
                            </select>

                        </div>
                    </div>

                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtidproducto">Tipo de producto</label>
                            <input type="text" class="form-control" name="idproducto" id="txtidproducto" placeholder="Ingrese la identificación de tipo de producto">
                        </div>
                    </div> -->
                    <!-- i-->
                    <div class="col-sm-6" id="materiaPrimaMulti" style="display:block">
                        <div class="form-group">
                            <label>Seleccione la materia prima </label>

                            <select name="idmateriaprima" class="form-group select2 materiaprima" id="txtidmateriaprima" style="width:250px ;height:37px;" onchange="selectMateriaPrima()">
                                <?php

                                include '../php/db.php';
                                session_start();
                                $idRestaurante =      $_SESSION['idRestaurante'];
                                $consulta1 = "SELECT * FROM materiaprima WHERE idrestaurante =" . $_SESSION['idRestaurante'];
                                $ejecutar1 = mysqli_query($conexion, $consulta1) or die(mysqli_error($conexion));
                                ?>
                                <option></option>
                                <?php foreach ($ejecutar1 as $opciones1) : ?>
                                    <option value="<?php echo $opciones1['idmateriaprima'] ?>"><?php echo $opciones1['nombre'] ?> </option>
                                <?php endforeach ?>
                            </select>

                        </div>
                    </div>

                    <!-- -->
                    <div class="col-sm-6" id="materiaPrima" style="display:none;">
                        <div class="form-group">
                            <label>Seleccione la materia prima</label>

                            <select name="idmateriaprima" class="form-group select2 materiaprima" id="txtidmateriaprimauno" style="width:250px ;height:37px;">
                                <?php

                                include '../php/db.php';
                                session_start();
                                $idRestaurante =      $_SESSION['idRestaurante'];
                                $consulta1 = "SELECT * FROM materiaprima WHERE idrestaurante =" . $_SESSION['idRestaurante'];
                                $ejecutar1 = mysqli_query($conexion, $consulta1) or die(mysqli_error($conexion));
                                ?>
                                <option></option>
                                <?php foreach ($ejecutar1 as $opciones1) : ?>
                                    <option value="<?php echo $opciones1['idmateriaprima'] ?>"><?php echo $opciones1['nombre'] ?> </option>
                                <?php endforeach ?>
                            </select>

                        </div>
                    </div>

                    <div class="col-sm-6" id="div_cantidad" style="display:none;">
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input class="form-control" name="cantidad" id="cantidad" min="0" type="number">
                            <input class="form-control" id="cantidad_asoc" min="0" type="hidden">
                        </div>
                    </div>
                    <div class="table-responsive table-detalle">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class='text-center'>Id</th>
                                    <th class='text-center'>Nombre</th>
                                    <th class='text-center'>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody id="tbody-producto-material-producto">
                            </tbody>
                        </table>
                    </div>


                    <!-- <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtidmateriaprima">idmateriaprima</label>
                            <input type="text" class="form-control" name="idmateriaprima" id="txtidmateriaprima" placeholder="Ingrese el idmateriaprima de la categoría">
                        </div>
                    </div> -->
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

<link rel="stylesheet" href="vistas/assets/dist/css/select2.min.css">
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {

        background-color: #007bff !important;
        color: #fff !important;
    }
</style>
<!-- ./ VENTANA MODAL PARA REGISTRO Y ACTUALIZACION -->
<script src="vistas/assets/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {

        $('.select2').select2({
            placeholder: "Seleccionar un item",
            width: '100%',
        });
        $('.materiaprima').select2({
            placeholder: "Seleccionar un item",
            width: '100%',
        });

        var accion = "";

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        var table = $("#tablaCategproducto").DataTable({
            "ajax": {
                "url": "ajax/producto_prima.ajax.php",
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
                    "targets": 3,
                    "sortable": false,
                    "render": function(data, type, full, meta) {
                        return "<center>" +
                            "<button type='button' class='btn btn-primary btn-sm btnEditar' data-toggle='modal' data-target='#modal-gestionar-producto' onclick='editarGestionar(" + full.idproducto + "," + full.idmateriaprima + "," + full.idpromat + "," + full.cantidad + "," + full.cantidad_asoc + ")'> " +
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


                {
                    "data": "idpromat"
                },
                {
                    "data": "nombre_producto"
                },
                {
                    "data": "nombre_materia_prima"
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
            $('.modal-title').html("Crear la materia prima de los productos");
            $('#tbody-producto-material-producto').html('');
            $('#materiaPrimaMulti').css("display", "block");
            $('.table-detalle').css("display", "block");
            $('#materiaPrima').css("display", "none");
             $('#div_cantidad').css("display", "none");
            listaIdMateriaPrima = [];
            listaIdMateriaPrima.pop();
        });
        var idmateriaprima= null;
        $('#tablaCategproducto tbody').on('click', '.btnEliminar', function() {
            var data = table.row($(this).parents('tr')).data();


            var idpromat = data["idpromat"];
            var idproducto = data["idproducto"];
            idmateriaprima = data["idmateriaprima"];



            var datos = new FormData();
            datos.append('accion', "eliminar")
            datos.append('idpromat', idpromat);

            // datos.append('Id', Id);

            swal.fire({

                title: "¡CONFIRMACION!",
                text: "¿Estas de acuerdo en elminar la materia prima del producto: " + idmateriaprima + "?" +
                    "¡Recuerda! que una vez eliminado no podras recuperarlo",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: "Sí, Eliminar",
                cancelButtonText: "Cancelar"

            }).then(resultado => {

                if (resultado.value) {

                    //LLAMADO AJAX
                    $.ajax({
                        url: "ajax/producto_prima.ajax.php",
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
                        title: "cancelaste la eliminacion del producto : " + idmateriaprima
                    });
                }

            })
        })

        $('#tablaCategproducto tbody').on('click', '.btnEditar', function() {

            var data = table.row($(this).parents('tr')).data();
            accion = "actualizar";

        })
        var datos = new FormData();
 
        // GUARDAR LA INFORMACION DE CATEGORIA DESDE LA VENTANA MODAL
        $("#btnGuardar").on('click', function() {


            if (accion == 'actualizar') {
                if ($('#cantidad_asoc').val() <= $('#cantidad').val()) {
                    Toast.fire({
                        icon: 'error',
                        title: "La cantidad ingresada es mayor a la que esta disponible en inventario : "

                    });
                    return 0;
                }
                datos.append('cantidad', $('#cantidad').val())
                idmateriaprima = $('#txtidmateriaprimauno').val();
            }

            var idpromat = $("#txtidpromat").val();
            var idproducto = $("#txtidproducto").val();

            if (accion == 'registrar') {
                idmateriaprima = $('#txtidmateriaprima').val();
                if (idproducto == '') {

                    Toast.fire({
                        icon: 'info',
                        title: "No se puede enviar una asociación sin un producto."
                    });
                    return 0;
                }
                console.log('listaIdMateriaPrima',listaIdMateriaPrima.length);
                if (listaIdMateriaPrima.length == 0) {

                    Toast.fire({
                        icon: 'error',
                        title: "No se puede enviar sin datos de la materia prima."
                    });

                    return 0;
                }
                Toast.fire({
                    icon: 'info',
                    title: "Materia prima con cantidad cero no será enviada."
                });
                datos.append('idproducto', idproducto);

                var data = JSON.stringify(listaIdMateriaPrima);

                datos.append('data', data);
                datos.append('accion', accion);
            } else {

                datos.append('idpromat', idpromat)
                datos.append('idproducto', idproducto)
                datos.append('idmateriaprima', idmateriaprima)
                datos.append('accion', accion);
            }

            swal.fire({
                title: "¡CONFIRMAR!",
                text: "¿Está de acuerdo con registrar el producto?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Si, deseo registrar",
                cancelButtonText: "Cancelar"
            }).then(resultado => {
                if (resultado.value) {
                    $.ajax({
                        url: "ajax/producto_prima.ajax.php",
                        method: "POST",
                        data: datos,
                        cache: false,
                        contentType: false,
                        processData: false,
                        datatype: 'json',
                        success: function(respuesta) {
                            table.ajax.reload(null, false);

                            $('#modal-gestionar-producto').modal('hide');
                            if (accion === 'registrar') {
                                $('.select2').val(null).trigger('change');
                              ///  $(".select2").select2("val", "");
                            } else {
                                $(".select2").val("");

                            }

                            console.log('data',datos)

                            // $("#ddlEstado").val([1]);
                            // ALERTAS AMIGABLESS 
                            Toast.fire({
                                icon: 'success',
                                title: respuesta
                            })

                            listaIdMateriaPrima.pop();
                            $('#tbody-producto-material-producto').html('');

                        }


                    });

                } else {
                    Toast.fire({
                        icon: 'error',
                        title: " Cancelaste la asociación de producto con materia prima: "
                    });
                }
            })




        })


    })

    function editarGestionar(idproducto, idmateriaprima, idpromat, cantidad, cantidad_asoc) {

        $('.table-detalle').css("display", "none");
        $('.select2').val(null).trigger('change');

        $('.modal-title').html('Editar la materia prima de los productos');
        $('#txtidproducto').val(idproducto).trigger('change.select2');
        $('#materiaPrimaMulti').css("display", "none");
        $('#materiaPrima').css("display", "block");
        $('#div_cantidad').css("display", "block");
        $('#txtidmateriaprimauno').val(idmateriaprima).trigger('change.select2');
        $('#txtidpromat').val(idpromat);
        $('#cantidad').val(cantidad_asoc);
        $('#cantidad_asoc').val(cantidad_asoc);

        // console.log('data', idproducto, idmateriaprima)
    }
    var listaIdMateriaPrima = new Array();

    function selectMateriaPrima() {

        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        var materiaPrima = $('#txtidmateriaprima').val() ?? $('#txtidmateriaprimauno').val();

        for (i = 0; i < listaIdMateriaPrima.length; i++) {
            if (listaIdMateriaPrima[i]['idmateriaprima'] == materiaPrima) {

                Toast.fire({
                    text: "No se puede agregar la misma materia prima.",
                    icon: "error",
                });
                return false;
            }
        }

        var datos = new FormData();
        // var idmateriaprima = $("#txtidmateriaprima").val()
        datos.append('idmateriaprima', materiaPrima)
        datos.append('accion', 'getMateriaPrima');

        $.ajax({
            url: "ajax/producto_prima.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta) {
                var respuestaJson = JSON.parse(respuesta);

                var input = "<tr id=" + respuestaJson.data.idmateriaprima + "><td class='text-center'><input class='text-center' id'idmateriaprima" + respuestaJson.data.idmateriaprima + "'  name='idmateriaprima[]' value=" + respuestaJson.data.idmateriaprima + " min='0' disabled/></td><td class='text-center'><input class='text-center' id='nombre" + respuestaJson.data.idmateriaprima + "' name='nombre[]' value=" + respuestaJson.data.nombre + " disabled/></td><td class='text-center'><input class='text-center' id='cantidad" + respuestaJson.data.idmateriaprima + "' name='cantidad[]' type='number' value='0' min='0'  max =" + respuestaJson.data.cantidad + " onkeyup='validacionCantidad(" + respuestaJson.data.idmateriaprima + "," + respuestaJson.data.cantidad + ")' required /></td><td><button type='button' class='btn btn-danger btn-sm ' onclick='eliminarMateriaPrima(" + respuestaJson.data.idmateriaprima + ")'><i class='fas fa-trash'></i> "
                "</button></td></tr>";

                $('#tbody-producto-material-producto').append(input);

                Toast.fire({
                    icon: 'success',
                    title: respuestaJson.message
                })


            }


        });



    }

    function eliminarMateriaPrima(id) {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        if ($('#' + id).remove()) {

            listaIdMateriaPrima.pop();

            Toast.fire({
                text: " Se ha eliminado correctamente, la materia prima!.",
                icon: "info",
            });

            for (i = 0; i < listaIdMateriaPrima.length; i++) {
                if (listaIdMateriaPrima[i]['idmateriaprima'] == id) {

                    listaIdMateriaPrima.splice(i);
                    return false;

                }
            }
        }

    }

    function validacionCantidad(id, cantidad) {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000
        });
        array = new Array();
        var cantidadIngresada = parseInt($('#cantidad' + id).val());


        if (!Number.isInteger(cantidadIngresada)) {
            Toast.fire({
                text: " El número de cantidad de materia prima, no puede ser negativo, vacio o decia.",
                icon: "error",
            });
            return false;
        }

        if (cantidadIngresada > 0 && cantidad >= cantidadIngresada) {

            let materiap = {
                'idmateriaprima': id,
                'cantidad': cantidadIngresada

            };

            if (listaIdMateriaPrima.length > 0) {

                for (i = 0; i < listaIdMateriaPrima.length; i++) {
                    var found = null;
                    found = listaIdMateriaPrima.find(element => element.idmateriaprima == id);
                    if (listaIdMateriaPrima[i]['idmateriaprima'] === id) {
                        if (found != undefined) {
                            found.cantidad = cantidadIngresada
                        }

                    } else {
                        if (found == undefined) {
                            listaIdMateriaPrima.push(materiap);
                        }

                    }

                }



            } else {
                listaIdMateriaPrima.push(materiap);

            }

        } else {
            Toast.fire({
                text: " La cantidad de materia prima ingresada superá la cantidad inventario",
                icon: "error",
            });
            return false;
        }




        // if(!NaN){}


    }
</script>