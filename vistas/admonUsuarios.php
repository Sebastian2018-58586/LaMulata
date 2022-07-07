<!-- CONTENT-HEADER -->
<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">
                <h1>Administrar usuarios</h1>
            </div>

            <div class="col-sm-6">

                <ol class="breadcrumb float-sm-right">

                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>

                    <li class="breadcrumb-item active">Gestor de usuarios</li>
                </ol>

            </div>
        </div>
    </div>

</section>


<!-- CONTENT -->
<section class="content">

    <div class="container-fluid">

        <div class="btn-agregar-categoria btnAgregar">
            <button type="button" class="btn btn-info btn-sm mb-4" data-toggle="modal"
                data-target="#modal-gestionar-producto" data-dismiss="modal"> <i class="fas fa-plus-square"></i> Agregar
                Usuario</button>
        </div>

        <table id="tablaUsuarios" class="table table-striped table-bordered nowrap" style="width:100%;">
            <thead class="bg-info">
                <tr>
                    <!-- <td style="width:5%;">Id</td>
                    <td>nombre</td> -->
                    <!-- <td>Ruta</td> -->
                    <!-- <td style="width:15%;">Fecha</td> -->
                    <!-- <td style="width:10%;">Estado</td> -->
                    <!-- <td style="width:5%;">idrestaurante</td> -->
                    <td style="width:5%;">id_usuario</td>
                    <td style="width:5%;">Nombre</td>
                    <td style="width:5%;">Apellido</td>
                    <td style="width:5%;">Dirección</td>
                    <td style="width:5%;">Teléfono</td>
                    <td style="width:5%;">Rol</td>
                    <!-- <td style="width:5%;">Correo</td> -->
                    <!-- <td style="width:5%;">Contraseña</td> -->
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
                <h4 class="modal-title">Crear usuario</h4>
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
                            <label for="txtidusuario">identifiacion del usuario</label>
                            <input type="number" class="form-control" name="idusuario" id="txtidusuario"
                                placeholder="Ingrese el id del usuario">
                            <!-- <div class="valid-feedback">Ok valido</div>
                                    <div class="invalid-feedback"> Complete el campo</div> -->
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtnombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="txtnombre"
                                placeholder="Ingrese el nombre">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtapellido">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="txtapellido"
                                placeholder="Ingrese el apellido">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtdireccion">Dirección</label>
                            <input type="text" class="form-control" name="direccion" id="txtdireccion"
                                placeholder="Ingrese la dirección">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txttelefono">Teléfono</label>
                            <input type="number" class="form-control" name="telefono" id="txttelefono"
                                placeholder="Ingrese el numero de teléfono">
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtcontrasena">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" id="txtcontrasena"
                                placeholder="Ingrese la contraseña">
                        </div>
                    </div>
              

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="txtidrol">Rol</label>
                            <select name="idrol" class="form-group" id="txtidrol"
                                style="width:250px ;height:37px;overflow: hidden">
                                <?php
                                    include '../php/db.php';
                                    $consulta = "SELECT * FROM rol";
                                    $ejecutar = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
                                    ?>
                                <!-- <option>Seleccione el tipo de materia prima</option> -->
                                <?php foreach ($ejecutar as $opciones) : ?>
                                <option value="<?php echo $opciones['idrol'] ?>"><?php echo $opciones['nombre'] ?>
                                </option>
                                <?php endforeach ?>
                            </select>
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

    var table = $("#tablaUsuarios").DataTable({
        "ajax": {
            "url": "ajax/usuarios.ajax.php",
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

            // {
            //     "data": "idrestaurante"
            // },
            {
                "data": "idusuario"
            },
            {
                "data": "nombre"
            },
            {
                "data": "apellido"
            },
            {
                "data": "direccion"
            },
            {
                "data": "telefono"
            },
            {
                "data": "idrol"
            },
            // {
            //     "data": "contrasena"
            // },
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

        // var idrestaurante = data["idrestaurante"];
        var idusuario = data["idusuario"];
        var nombre = data["nombre"];
        var apellido = data["apellido"];
        var direccion = data["direccion"];
        var telefono = data["telefono"];
        // var correo = data["correo"];
        var contrasena = data["contrasena"];
        // var contrasena1 = data["contrasena1"];
        var idrol = data["idrol"];




        var datos = new FormData();
        datos.append('accion', "eliminar")
        datos.append('idusuario', idusuario);

        // datos.append('Id', Id);

        swal.fire({
            title: "¡CONFIRMACION!",
            text: "¿Estas de acuerdo en elminar el usuario " + nombre + "?" +
                "¡Recuerda! que una vez eliminado no podras recuperarlo",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: "Sí, Eliminar",
            cancelButtonText: "Cancelar"

        }).then(resultado => {

            if (resultado.value) {

                //LLAMADO AJAX
                $.ajax({
                    url: "ajax/usuarios.ajax.php",
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
                    title: "cancelaste la eliminacion del usuario : " + nombre
                });
            }

        })
    })

    $('#tablaUsuarios tbody').on('click', '.btnEditar', function() {

        var data = table.row($(this).parents('tr')).data();
        accion = "actualizar";

        // $("#idCategoria").val(data["id"])

        // $("#txtId").val(data["id"]);
        // $("#txtNombre").val(data["nombre"]);


        // $("#txtidrestaurante").val(data["idrestaurante"])

        $("#txtidusuario").val(data["idusuario"])
        $("#txtnombre").val(data["nombre"]);
        $("#txtapellido").val(data["apellido"]);
        $("#txtdireccion").val(data["direccion"]);
        $("#txttelefono").val(data["telefono"]);
        // $("#txtcorreo").val(data["correo"]);
        $("#txtcontrasena").val(data["contrasena"]);
        // $("#txtcontrasena1").val(data["contrasena1"]);
        $("#txtidrol").val(data["idrol"]);






        // $("#txtFecha").val(data["fecha"]);
        // $("#ddlEstado").val(data["estado"]);

        // alert(data["nombre"]);
    })

    // GUARDAR LA INFORMACION DE CATEGORIA DESDE LA VENTANA MODAL
    $("#btnGuardar").on('click', function() {






        // fecha = new Date().toISOString().replace(/T/, ' ').replace(/\..+/, '');

        var idusuario = $("#txtidusuario").val(),
            nombre = $("#txtnombre").val(),
            apellido = $("#txtapellido").val(),
            direccion = $("#txtdireccion").val(),
            telefono = $("#txttelefono").val(),
            contrasena = $("#txtcontrasena").val(),
            idrol = $("#txtidrol").val();

        var datos = new FormData();


        // var idusuario = data["idusuario"];
        // var nombre = data["nombre"];
        // var apellido = data["apellido"];
        // var direccion = data["direccion"];
        // var telefono = data["telefono"];
        // var correo = data["correo"];
        // var contrasena = data["contrasena"];


        // datos.append('idrestaurante', idrestaurante)
        datos.append('idusuario', idusuario)
        datos.append('nombre', nombre)
        datos.append('apellido', apellido)
        datos.append('direccion', direccion)
        datos.append('telefono', telefono)
        datos.append('contrasena', contrasena)
        datos.append('idrol', idrol)



        datos.append('accion', accion);

        if (!(/^\d{8}$/.test(idusuario) || /^\d{10}$/.test(idusuario))) {
            swal.fire({
                title: "¡Advertencia!",
                text: "La identificacion debe contener solo 8 y 10 digitos ",
                icon: 'error',
                cancelButtonText: "Aceptar"
            })

        } else {

            if (idusuario == "" || nombre == "" || apellido == "" || direccion == "" || telefono ==
                "" || contrasena == "") {
                swal.fire({
                    title: "¡Advertencia!",
                    text: "Por favor llenar todos los campos",
                    icon: 'error',
                    cancelButtonText: "Aceptar"
                })
            } else {
                if (!(/^\d{7}$/.test(telefono) || /^\d{10}$/.test(telefono))) {
                    swal.fire({
                        title: "¡Advertencia!",
                        text: "El telefono debe contener ",
                        icon: 'error',
                        cancelButtonText: "Aceptar"
                    })

                } else {


                    swal.fire({
                        title: "¡CONFIRMAR!",
                        text: "¿Está de acuerdo con registrar el usuario ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: "Si, deseo registrar",
                        cancelButtonText: "Cancelar"
                    }).then(resultado => {
                        if (resultado.value) {
                            $.ajax({
                                url: "ajax/usuarios.ajax.php",
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
                                    // $("#txtNombre").val("");


                                    // $("#txtidrestaurante").val("");
                                    $("#txtidusuario").val("");
                                    $("#txtnombre").val("");
                                    $("#txtapellido").val("");
                                    $("#txtdireccion").val("");
                                    $("#txttelefono").val("");
                                    // $("#txtcorreo").val("");
                                    $("#txtcontrasena").val("");

                                    $("#txtidrol").val("");







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
                                title: "cancelaste el registro del producto : " + nombre
                            });
                        }
                    })


                }
            }
        }

    })


})
</script>