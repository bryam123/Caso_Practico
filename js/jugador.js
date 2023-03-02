$(document).ready(function(){
    var funcion;
    var fila;
    funcion = 'mostrar_datos';
       var $tabla_personal = $('#example').DataTable({     
            "ajax": {
            "url": "../controller/ControllerPlayer.php",
            "method": "POST",
            "data":{funcion:funcion},   
        },
        "columns": [
            { "data": "id_apo" },
            { "data": "dni_apo" },
            { "data": "nombres_apo" },
            { "data": "edad_apo" },
            { "data": "telefono_apo" },
            { "data": "correo_apo" },
            { "data": "genero_apo" },
            { "data": "domicilio_apo"},
            { "defaultContent": `<button class="btn btn-xs btn-info m-1 visualizar_usuario" type="button" data-toggle="modal" data-target="#visualizar_usuario" title="Visualizar Usuario">
            <i class="far fa-eye"></i></button>` },
        ],

            responsive: {
                details: {
                    type: 'column',
                    target: 'tr'
                }
            },

            columnDefs: [ 
            { className: 'control text-center', targets: 0 },
            { className: "align-middle", targets: "_all" },
            ],

            "language": spanish,
        });

    $(document).on('click','.visualizar_usuario',function(){
        funcion = 'visualizar_jugador';
        fila = $(this).closest("tr");
        let id = parseInt(fila.find('td:eq(0)').text());
        //console.log(funcion);
        $.post('../controller/ControllerPlayer.php',{funcion,id},(response)=>{
          //  console.log(response);
            const usuario = JSON.parse(response);
            var cadena="";
            cadena+=`           
            <div class="card-header p-0 pt-2"></div>
            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <h2 class="text-dark fs-5" style="width: 13rem;"><b>${usuario.nombres}</b></h2>
                  <ul class="ml-4 mb-0 fa-ul text-dark pt-3">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-address-card"></i></span>: ${usuario.dni}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-birthday-cake"></i></span>: ${usuario.edad}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>: ${usuario.direccion}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span>: ${usuario.correo}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>: ${usuario.telefono}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-smile-wink"></i></span>: ${usuario.genero}</li>
                  </ul>
                <div class="mt-3">
                  <button onclick="editar_personal('${usuario.dni}')" data-toggle="modal" data-target="#editar_usuario" class="btn btn-sm btn-outline-primary"><i class="fas fa-user-edit mr-1"></i>Edit</button> 
                  <button onclick="historial('${usuario.dni}')"><i class="fas fa-user-edit mr-1"></i>Record</button> 
                </div>
                </div>  
                <div class="col-6 text-center">
                    <img src="../assets/img/${usuario.avatar}" alt="" class="img-circle img-fluid">
                </div>
                </div>
                </div>`;             
            $('#perfil').html(cadena);   
        })    
    }); 
    $('#form-editar-usuario').submit(e=>{
        funcion = "editar_trabajador";
        var dni = $('#dni_tra1').val();
        let nombre = $('#nombre_tra1').val();
        let paterno = $('#paterno_tra1').val();
        let materno = $('#materno_tra1').val();
        let nacimiento = $('#nacimiento_tra1').val();
        let edad = $('#edad_tra1').val();
        let domicilio =$('#domicilio_tra1').val();
        let telefono = $('#telefono_tra1').val();
        let genero = $('#genero_tra1').val();
        let correo = $('#correo_tra1').val();
       $.post('../controller/ControllerPlayer.php',{funcion,dni,nombre,paterno,materno,nacimiento,edad,domicilio,telefono,genero,correo},(response)=>{
        console.log(response);
         if(response == 'Editado'){
                let formData = new FormData($('#form-editar-usuario')[0]);
                $.ajax({
                    url: '../controller/ControllerPlayer.php',
                    type:'POST',
                    data: formData,
                    cache:false,
                    processData: false,
                    contentType: false
                }).done(function(res){
                    const usuario = JSON.parse(res);
                    if(usuario.alert == 'edit'){
                        toastr.success('Foto cambiada Correctamente!!');   
                    }else{
                        toastr.info('No agregaste una Foto!!');   
                    }
                }) 
                toastr.success('Paso realizado con exito!!');
                window.location.href = "../view/sales_promoter_manager.php";
            }else{
                toastr.error('Revise los datos ingresados!!');                 
            }
        })
        e.preventDefault(); 

    })

    $('#form-crear-usuario').submit(e=>{
        funcion = "crear_usuario";
        let dni = $('#dni_tra').val();
        let nombre = $('#nombre_tra').val();
        let paterno = $('#paterno_tra').val();
        let materno = $('#materno_tra').val();
        let nacimiento = $('#nacimiento_tra').val();
        let edad = $('#edad_tra').val();
        let domicilio =$('#domicilio_tra').val();
        let telefono = $('#telefono_tra').val(); 
        let genero = $('#genero_tra').val();
        let correo = $('#correo_tra').val();

       $.post('../controller/ControllerPlayer.php',{funcion,dni,nombre,paterno,materno,nacimiento,edad,domicilio,telefono,genero,correo},(response)=>{
        //console.log(response);
              if(response == 'Agregado'){
                let formData = new FormData($('#form-crear-usuario')[0]);
                $tabla_personal.ajax.reload(null,false);
                $.ajax({
                    url: '../controller/ControllerPlayer.php',
                    type:'POST',
                    data: formData,
                    cache:false,
                    processData: false,
                    contentType: false
                }).done(function(res){
                    const usuario = JSON.parse(res);
                    if(usuario.alert == 'edit'){
                        toastr.success('Foto agregada Correctamente!!');   
                    }else{
                        toastr.info('No agregaste una Foto!!');   
                    }
                })
                $('#add').hide('slow');
                $('#add').show(1000);
                $('#add').hide(2000);  
                $('#form-crear-usuario').trigger('reset');     
                cantidad_personas();  
                cantidad_fichas();
            }else{
                $('#no-add').hide('slow');
                $('#no-add').show(1000);
                $('#no-add').hide(2000);
            }
        })
        e.preventDefault(); 
    })

    function filename(){
		var rutaAbsoluta = self.location.href;   
		var posicionUltimaBarra = rutaAbsoluta.lastIndexOf("/");
		var rutaRelativa = rutaAbsoluta.substring( posicionUltimaBarra + "/".length , rutaAbsoluta.length );
		return rutaRelativa;  
	}

    $('#nacimiento_tra').change(function(){
        let nacimiento = $('#nacimiento_tra').val();
        let actual = new Date();
        let fecha = new Date(nacimiento);
        let ano = fecha.getFullYear(); //obteniendo año
        let year = actual.getFullYear();
        let edad = year - ano;
        document.getElementById('edad_tra').value= edad;
    })
    
    $('#nacimiento_tra1').change(function(){
        let nacimiento = $('#nacimiento_tra1').val();
        let actual = new Date();
        let fecha = new Date(nacimiento);
        let ano = fecha.getFullYear(); //obteniendo año
        let year = actual.getFullYear();
        let edad = year - ano;
        document.getElementById('edad_tra1').value = edad;
    })  
}); 

    let spanish={
    "aria": {
        "sortAscending": "Activar para ordenar la columna de manera ascendente",
        "sortDescending": "Activar para ordenar la columna de manera descendente"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmente"
    },
    "buttons": {
        "collection": "Colección",
        "colvis": "Visibilidad",
        "colvisRestore": "Restaurar visibilidad",
        "copy": "Copiar",
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
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "infoThousands": ",",
    "lengthMenu": "Mostrar _MENU_ registros",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "processing": "Procesando...",
    "search": "Buscar:",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor",
        "conditions": {
            "date": {
                "after": "Después",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "not": "Diferente de",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual a",
                "not": "Diferente de",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina con",
                "equals": "Igual a",
                "not": "Diferente de",
                "startsWith": "Inicia con",
                "notEmpty": "No vacío"
            },
            "array": {
                "equals": "Igual a",
                "empty": "Vacío",
                "contains": "Contiene",
                "not": "Diferente",
                "notEmpty": "No vacío",
                "without": "Sin"
            }
        },
        "data": "Datos"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d",
        "countFiltered": "{shown} ({total})"
    },
    "select": {
        "cells": {
            "1": "1 celda seleccionada",
            "_": "$d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        }
    },
    "thousands": ",",
    "datetime": {
        "previous": "Anterior",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "am",
            "pm"
        ],
        "next": "Siguiente",
        "months": {
            "0": "Enero",
            "1": "Febrero",
            "10": "Noviembre",
            "11": "Diciembre",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre"
        },
        "weekdays": [
            "Domingo",
            "Lunes",
            "Martes",
            "Miércoles",
            "Jueves",
            "Viernes",
            "Sábado"
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
        "multi": {
            "title": "Múltiples Valores",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga click o toque aquí, de lo contrario conservarán sus valores individuales."
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\"> Más información<\/a>)."
        }
    },
    "decimal": ".",
    "emptyTable": "No hay datos disponibles en la tabla",
    "info": "Mostrando de _START_ al _END_ de  _TOTAL_ registros",
    "zeroRecords": "No se encontraron coincidencias"
};
