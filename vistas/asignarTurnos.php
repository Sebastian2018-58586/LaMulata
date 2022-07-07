<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Asignación de turnos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">inicio</a></li>
                    <li class="breadcrumb-item active">Asignación de turnos</li>

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- <script>
document = document.getElementById("current_date").innerHTML = Date();
</script> -->



<!-- CONTENT -->
<section class="content">

    <div class="container-fluid">

        <div class="btn-agregar-categoria btnAgregar">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal"
                data-target="#modal-gestionar-producto" data-dismiss="modal"> <i class="fas fa-plus-square"></i> Agregar
                Turno</button>
        </div>

        <table id="tablaUsuarios" class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead class="bg-info">
                <tr>
                    <!-- <td style="width:5%;">Id</td>
                    <td>nombre</td> -->
                    <!-- <td>Ruta</td> -->
                    <!-- <td style="width:15%;">Fecha</td> -->
                    <!-- <td style="width:10%;">Estado</td> -->
                    <td style="width:5%;">idrestaurante</td>
                    <td style="width:10%;">id_turno </td>
                    <td style="width:5%;">Empleado</td>
                    <td style="width:5%;">Fecha</td>
                    <td style="width:5%;">Hora_entrada</td>
                    <td style="width:5%;">Hora_salida</td>
                    
               
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
                <h4 class="modal-title">Gestionar Turnos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- 
            ============================================================
            =MODAL BODY
            =============================================================== -->
            <div class="modal-body">
                <div class="row">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Seleccione la sede </label>

                            <select name="idrestaurante" class="form-group" id="txtidrestaurante"
                                style="width:250px ;height:37px;overflow: hidden">
                                <?php
                                include '../php/db.php';
                                $consulta = "SELECT * FROM restaurante ";
                                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
                                ?>
                                <!-- <option>Seleccione la sede</option> -->
                                <?php foreach ($ejecutar as $opciones) : ?>
                                <option value="<?php echo $opciones['idrestaurante'] ?>">
                                    <?php echo $opciones['nombre'] ?></option>
                                <?php endforeach ?>
                            </select>

                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Seleccione el empleado </label>

                            <select name="idempleado" class="form-group" id="txtidempleado"
                                style="width:250px ;height:37px;overflow: hidden">
                                <?php
                                include '../php/db.php';
                                $consulta = "SELECT * FROM empleados";
                                $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
                                ?>
                                <!-- <option>Seleccione la sede</option> -->
                                <?php foreach ($ejecutar as $opciones) : ?>
                                <option value="<?php echo $opciones['idempleado'] ?>">
                                    <?php echo $opciones['nombre'], $opciones['apellido'] ?></option>
                                <?php endforeach ?>
                            </select>

                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtfecha">Fecha</label>
                            <input type="date" class="form-control" name="fecha" id="txtfecha">
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txthoraentrada">Hora de entrada</label>
                            <input type="time" class="form-control" name="horaentrada" id="txthoraentrada">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txthorasalida">Hora de salida</label>
                            <input type="time" class="form-control" name="horasalida" id="txthorasalida">
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




<!-- /.content -->
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

    var table = $("#tablaUsuarios").DataTable({
        "ajax": {
            "url": "ajax/turnos.ajax.php",
            "type": "POST",
            "dataSrc": ""
        },
        "columnDefs": [

            {
                // "targets": 2,
                "targets": 6,
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
            //     "data": "id"
            // },
            // {"data": "categoria"},
            // {"data": "ruta"},
            // {"data": "fecha"},
            // {"data": "estado"},
            // {
            //     "data": "nombre"
            // },

            {
                "data": "idrestaurante"
            },
            {
                "data": "idturno"
            },
            {
                "data": "idempleado"
            },
            {
                "data": "fecha"
            },
            {
                "data": "horaentrada"
            },
            {
                "data": "horasalida"
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

    $('#tablaUsuarios tbody').on('click', '.btnEliminar', function() {
        var data = table.row($(this).parents('tr')).data();

        // alert(data["Id"]);

        // id que esta en naranja se trae de la taba  de a ventana 

        // var Id = data["id"];
        // var nombre = data["nombre"];

        var idrestaurante = data["idrestaurante"];
        var idturno = data["idturno"];
        var fecha = data["fecha"];
        var horaentrada = data["horaentrada"];
        var horasalida = data["horasalida"];
        var idempleado = data["idempleado"];
        // var correo = data["correo"];
        // var contrasena = data["contrasena"];
        // var contrasena1 = data["contrasena1"];



        var datos = new FormData();
        datos.append('accion', "eliminar")
        datos.append('idturno', idturno);

        // datos.append('Id', Id);

        swal.fire({
            title: "¡CONFIRMACION!",
            text: "¿Estas de acuerdo en elminar el turno ?" +
                "¡Recuerda! que una vez eliminado no podras recuperarlo",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: "Sí, Eliminar",
            cancelButtonText: "Cancelar"

        }).then(resultado => {

            if (resultado.value) {

                //LLAMADO AJAX
                $.ajax({
                    url: "ajax/turnos.ajax.php",
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
                    title: "cancelaste la eliminacion del turno: " + fecha
                });
            }

        })
    })

    $('#tablaUsuarios tbody').on('click', '.btnEditar', function() {

        var data = table.row($(this).parents('tr')).data();
        accion = "actualizar";

        // $("#idCategoria").val(data["id"])

        // $("#txtId").val(data["id"]);
        // $("#txtfecha").val(data["fecha"]);


        $("#txtidrestaurante").val(data["idrestaurante"])

        $("#txtidturno").val(data["idturno"])
        $("#txtfecha").val(data["fecha"]);
        $("#txthoraentrada").val(data["horaentrada"]);
        $("#txthorasalida").val(data["horasalida"]);
        $("#txtidempleado").val(data["idempleado"]);
        // $("#txtcorreo").val(data["correo"]);
        // $("#txtcontrasena").val(data["contrasena"]);
        // $("#txtcontrasena1").val(data["contrasena1"]);





        // $("#txtFecha").val(data["fecha"]);
        // $("#ddlEstado").val(data["estado"]);

        // alert(data["fecha"]);
    })

    // GUARDAR LA INFORMACION DE CATEGORIA DESDE LA VENTANA MODAL
    $("#btnGuardar").on('click', function() {




        var idrestaurante = $("#txtidrestaurante").val(),

            // fecha = new Date().toISOString().replace(/T/, ' ').replace(/\..+/, '');

            idturno = $("#txtidturno").val(),
            fecha = $("#txtfecha").val(),
            horaentrada = $("#txthoraentrada").val(),
            horasalida = $("#txthorasalida").val(),
            idempleado = $("#txtidempleado").val();


        var datos = new FormData();


        // var idturno = data["idturno"];
        // var fecha = data["fecha"];
        // var horaentrada = data["horaentrada"];
        // var horasalida = data["horasalida"];
        // var idempleado = data["idempleado"];
        // var correo = data["correo"];
        // var contrasena = data["contrasena"];


        datos.append('idrestaurante', idrestaurante)
        datos.append('idturno', idturno)
        datos.append('fecha', fecha)
        datos.append('horaentrada', horaentrada)
        datos.append('horasalida', horasalida)
        datos.append('idempleado', idempleado)
        // datos.append('correo', correo)
        // datos.append('contrasena', contrasena)




        // datos.append('estado', estado);
        // datos.append('fecha', fecha);
        datos.append('accion', accion);

        swal.fire({
            title: "¡CONFIRMAR!",
            text: "¿Está de acuerdo con registrar el turno?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "Si, deseo registrar",
            cancelButtonText: "Cancelar"
        }).then(resultado => {
            if (resultado.value) {
                $.ajax({
                    url: "ajax/turnos.ajax.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(respuesta) {
                        console.log(respuesta);


                        table.ajax.reload(null, false);
                        // CERRAR VENTANA MODAL 
                        // $("#modal-gestionar-producto").modal('hide');


                        // $("#id").val("");


                        // $("#txtId").val("");
                        // $("#txtfecha").val("");


                        $("#txtidrestaurante").val("");
                        $("#txtidturno").val("");
                        $("#txtfecha").val("");
                        $("#txthoraentrada").val("");
                        $("#txthorasalida").val("");
                        $("#txtidempleado").val("");
                        // $("#txtcorreo").val("");
                        // $("#txtcontrasena").val("");






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
                    title: "cancelaste el registro del turno : " + fecha
                });
            }
        })




    })


})
</script>