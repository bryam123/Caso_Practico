$(document).ready(function (){
    var funcion;
    var trabajador = $('#ficha_m').val();

    if(trabajador != ""){
        toastr.success('Primera parte realizada correctamente!!!');
    }  
    buscar_trabajador(trabajador);

      $('#form-trabajador').submit(e=>{
        funcion = "editar_recibo";
        let id_tra = $('#id_jug').val();
        let ficha = $('#ficha').val();
        if (ficha==null) {ficha=0; }
        let can_com =$('#can_com').val();
        let ban_rec = $('#ban_rec').val();
        let mon_re = $('#mon_re').val();
        console.log(funcion,id_tra,ficha,can_com,ban_rec,mon_re)
       $.post('../controller/ControllerPlayer.php',{funcion,ficha,id_tra,can_com,ban_rec,mon_re},(response)=>{
        console.log(response);
         if(response == 'Editado'){ 
                toastr.success('Guardado con exito!!');
                window.location.href = "../view/receipt_manager.php";
            }else{
                toastr.error('Revise los datos ingresados!!');                 
            }
        })
        e.preventDefault(); 
    })

    function buscar_trabajador(id){
        funcion = "buscar_trabajador";
        $.post('../controller/ControllerPlayer.php',{funcion,id},(response)=>{
            const usuario = JSON.parse(response);
            $('#ficha').val(usuario.id_fic);
            $('#id_jug').val(usuario.id_tra);
            $('#dim_act').val(usuario.dim_act);
            $('#nombre_tra').val(usuario.nombre_tra);
            $('#paterno_tra').val(usuario.paterno_tra);
            $('#materno_tra').val(usuario.materno_tra);
            $('#nacimiento_tra').val(usuario.nacimiento_tra);
            $('#dni_tra').val(usuario.dni_tra);
            $('#domicilio_tra').val(usuario.domicilio_tra);
            $('#telefono_tra').val(usuario.telefono_tra);
            $('#correo_tra').val(usuario.correo_tra);
            $('#us_tipo').val(usuario.us_tipo_tra);
            $('#domicilio_tra').val(usuario.domicilio_tra);
            $('#can_com').val(usuario.can_com);
            $('#ban_rec').val(usuario.ban_rec);
            $('#mon_re').val(usuario.mon_re);
        })
    }

})