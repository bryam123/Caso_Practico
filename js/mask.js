$(document).ready(function(){ 
    var funcion;
    var fila;

    funcion = 'mostrar_datos';
    var $tabla_mask = $('#example').DataTable({       
        "ajax": {
        "url": "../Controlador/MaskController.php",
        "method": "POST",
        "data":{funcion:funcion},   
    },
    "columns": [
        { "data": "id_mask" },
        { "data": "nombre_mask" },
        { "data": "apellido_mask" },
        { "data": "dni_mask" },
        { "data": "telefono_mask" },
        { "data": "dias_mask" },
        { "data": "mes_mask" },
        { "data": "año_mask" },
        { "data": "estado_mask" },
        { "data": "fecha_mask" },
        { "defaultContent": `<button class="btn btn-info m-1 editar_masc" type="button" data-toggle="modal" data-target="#editar_mask" title="Editar usuario mascarillas">
        <i class="far fa-edit"></i></button>
        <button class="btn btn-danger m-1 eliminar_mask" title="Eliminar usuario mascarillas">
        <i class="fas fa-trash-alt"></i></button>` },
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

    $('#form_crear_usuario').submit(e=>{      
        funcion = 'crear_mask';
        $.post('../Controlador/MaskController.php',{funcion},(response)=>{
            console.log(response);
        })
        e.preventDefault();
    })

    $(document).on('click','.editar_masc',function(){

        fila = $(this).closest("tr");
        let id_mask = parseInt(fila.find('td:eq(0)').text());
        let nombre = fila.find('td:eq(1)').text();
        const apellidos = fila.find('td:eq(2)').text();
        const dni = fila.find('td:eq(3)').text();
        const telefono = fila.find('td:eq(4)').text();
        const dias = fila.find('td:eq(5)').text();
        const estado = fila.find('td:eq(8)').text();

        $('#id_mask').val(id_mask);
        $('#nombre').val(nombre);
        $('#apellidos').val(apellidos);
        $('#dni').val(dni);
        $('#telefono').val(telefono);
        $('#dias').val(dias);
        $('#estado').val(estado);        
    }); 

    $('#form_mask').submit(e=>{      
        funcion="editar_mask";
        let id = $('#id_mask').val();
        let dias = $('#dias').val();
        let estado = $('#estado').val();
        $.post('../Controlador/MaskController.php',{id,dias,estado,funcion},(response)=>{           
            if(response=='add'){
                $tabla_mask.ajax.reload(null,false);
                $('#add').hide('slow');
                $('#add').show(1000);
                $('#add').hide(2000);
                toastr.success('Edicion Exitosa.');
                $("#editar_mask .close").click();              
            }else{
                $('#no-add').hide('slow');
                $('#no-add').show(1000);
                $('#no-add').hide(2000);
            }
        })
        e.preventDefault();   
    })

    $(document).on('click','#PDF',(e)=>{
        window.open('../Vista/Reportes/reporte_mascarilla.php','Reporte del Mascarillas','_blank');
    });

   //Graficos

    $(document).on('click','#line',(e)=>{
        var GraficoLineal = document.getElementById('Grafica1').getContext('2d');
        var line = new Chart(GraficoLineal, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
     });
    });
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



/* OTRA forma de recibir datos ajax
        var template = '';
        const x = new XMLHttpRequest();
        x.open('POST','../Controlador/maskController.php',true);
        x.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        x.send('funcion=' + funcion,'consulta=' + datos);
        x.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var datos = this.responseText;
            }
            $('#usuarios_mask').html(template);
        }
*/

  /* buscar_datos();
        function buscar_datos(datos){
        funcion = 'buscar';
        $.post('../Controlador/MaskController.php',{datos,funcion},(response)=>{
            let template = '';
            const usuario = JSON.parse(response);
            usuario.forEach(usuario=>{
                let dia = `${usuario.dias}`;
                let semana = dia * 2;
                let mensual = semana * 4;
                let year = mensual * 12;
                template+=
                `
                <tr mask_id="${usuario.id}" mask_nombre="${usuario.nombre}" mask_apellidos="${usuario.apellidos}" mask_dni="${usuario.dni}" mask_telefono="${usuario.telefono}" mask_dias="${usuario.dias}" mask_estado="${usuario.estado}"  class="text-center">
                    <td class="align-middle">${usuario.nombre}</td>
                    <td class="align-middle">${usuario.apellidos}</td>
                    <td class="align-middle">${usuario.dni}</td>
                    <td class="align-middle">${usuario.telefono}</td>
                    <td class="align-middle">${usuario.dias}</td>
                    <td class="align-middle">${mensual}</td>
                    <td class="align-middle">${year}</td>
                    <td class="align-middle"><span class="badge bg-danger text-wrap" style="width: 6rem;">${usuario.estado}</span></td>
                    <td class="text-center">
                    <button class="btn btn-info m-1 editar_mask" type="button" data-toggle="modal" data-target="#editar_mask" title="Editar usuario mascarillas">
                    <i class="far fa-edit"></i></button>
                    <button class="btn btn-danger m-1 eliminar_mask" title="Eliminar usuario mascarillas">
                    <i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                `
            });
            $('#usuarios_mask').html(template);
        });
    }
    
    
    $(document).on('keyup','#buscar_usuario',function(){
        let valor = $(this).val();
        if(valor!=""){      
            buscar_datos(valor);
        }else{
            buscar_datos();
        }
    }) */