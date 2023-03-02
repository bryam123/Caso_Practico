$(document).ready(function(){
    var funcion;
    var trabajador = $('#dni').val();


    buscar_jugador(trabajador);
    buscar_historial_recibo(trabajador);

    function buscar_jugador(id){
        funcion = "buscar_trabajador";
        let cadenan="";
        
        $.post('../controller/ControllerPlayer.php',{funcion,id},(response)=>{
            const usuario = JSON.parse(response);
            if(usuario.aviso == 'ver'){
                cadenan=usuario.nombre_tra +" "+usuario.paterno_tra +" "+usuario.materno_tra;
                $('#nombre_jug').val(cadenan); 
                $('#monto_act').val(usuario.dim_act);
            }else{
                toastr.info('El usuario  tiene Antecedentes en su billetera');
            }
        })

    }

    function buscar_historial_recibo(id){
        funcion = "buscar_historial_recibo";
         console.log(id);
        $.post('../controller/ControllerPlayer.php',{funcion,id},(response)=>{
            console.log(response);
            const usuario = JSON.parse(response);
            if(usuario.aviso != 'no-ver'){
            let contador = 0;
            cadena ="";
            usuario.forEach(data=>{             
            contador++;
                cadena += "<tr>";
                    cadena +="<td>"+contador+"</td>";
                    cadena +="<td>"+data.fechaH+"</td>";
                    cadena +="<td>"+data.canalH+"</td>";
                    cadena +="<td>"+data.bancoH+"</td>";
                    cadena +="<td>"+data.ingresadoH+"</td>";
                    cadena +=`<td>
                    <button type="button" data-bs-target="#editar_recibo" data-bs-toggle="modal" onclick="editar(`+data.id_fic+`)" class='btn btn-info btn-sm'><i class='fas fa-edit'></i></button>
                    <button type="button" data-target="#eliminar_recibo" data-toggle="modal" onclick="eliminar(`+data.id_fic+`)" class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></button>
                    </td>`;
                cadena += "</tr>";                            
            });
            $('#table_recibo').html(cadena);
            }
        })
    };


    $('#form_editar').submit(e=>{
        funcion="editar_recibos";
        let id = $('#id_editar').val();
        let fecha_rec = $('#fecha_rec').val();
        let can_com_rec = $('#can_com_rec').val();
        let ban_rec = $('#ban_rec').val();
        let mon_ing_rec = $('#mon_ing_rec').val();
        $.post('../controller/ControllerPlayer.php',{funcion,id,fecha_rec,can_com_rec,ban_rec,mon_ing_rec},(response)=>{
            console.log(response);
            if(response == 'Editado'){
                toastr.success('Editado Correctamente!!');
                $("#Cerrar").click();
                buscar_jugador(trabajador);
                buscar_historial_recibo(trabajador);
            }else{
                toastr.error('Ocurrio un error en la edición!');
            }
        })
        e.preventDefault();
    })

    $('#form-eliminar-recibo').submit(e=>{
        funcion="eliminar_recibo";
        let id = $('#eliminar_user').val();
        $.post('../controller/ControllerPlayer.php',{funcion,id},(response)=>{
            if(response == 'eliminado'){
              $("#eliminar_recibo .close").click();    
              toastr.success('Usuario eliminado con exito!!');
              buscar_jugador(trabajador);
              buscar_trabajador_enfermedades(trabajador);
            }
        })
        e.preventDefault(); 
    })
})