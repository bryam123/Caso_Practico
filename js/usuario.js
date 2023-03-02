$(document).ready(function(){
    var id_usuario=$('#id_usuario').val();
    var edit = false;
    var funcion='';
    buscar_usuario(id_usuario);
    function buscar_usuario(dato){
        funcion = 'buscar_usuario';

        $.post('../controller/UsuarioController.php',{dato,funcion},(response)=>{
            console.log(response);
            let nombre='';
            let apellidos='';
            let edad='';
            let dni='';
            let telefono='';
            let tipo='';
            let direccion='';
            let correo='';
            let sexo='';
            let adicional='';
            const usuario = JSON.parse(response);
            nombre+=`${usuario.nombre}`;
            apellidos+=`${usuario.apellidos}`;
            edad+=`${usuario.edad}`;
            dni+=`${usuario.dni}`;
            telefono+=`${usuario.telefono}`;
            if(usuario.tipo=='Administrador')
                tipo+=`<h1 class="badge bg-danger text-wrap">${usuario.tipo}</h1>`;
            if(usuario.tipo=='Promotor')
                tipo+=`<h1 class="badge bg-primary text-wrap">${usuario.tipo}</h1>`;
            direccion+=`${usuario.direccion}`;
            correo+=`${usuario.correo}`;
            sexo+=`${usuario.sexo}`;
            adicional+=`${usuario.adicional}`;
            $('#nombre_us').html(nombre);
            $('#apellidos_us').html(apellidos);
            $('#edad_us').html(edad);
            $('#dni_us').html(dni);
            $('#telefono_us').html(telefono);
            $('#tipo_us').html(tipo);
            $('#direccion_us').html(direccion);
            $('#correo_us').html(correo);
            $('#sexo_us').html(sexo);
            $('#adicional_us').html(adicional);
            $('#foto_avatar').attr('src',usuario.avatar);
            $('#foto_avatar2').attr('src',usuario.avatar);
            $('#foto_avatar3').attr('src',usuario.avatar);
        });
    }

    $(document).on('click','.edit',(e)=>{
         funcion ='capturar_datos';
         edit = true;
        $.post('../controller/UsuarioController.php',{funcion,id_usuario},(response)=>{
            const usuario = JSON.parse(response);
            $('#telefono').val(usuario.telefono);
            $('#direccion').val(usuario.direccion);
            $('#correo').val(usuario.correo);
            $('#sexo').val(usuario.sexo);
            $('#adicional').val(usuario.adicional);
        })
    });

    $('#form-usuario').submit(e=>{
        if(edit==true){
            let telefono=$('#telefono').val();
            let direccion=$('#direccion').val();
            let correo=$('#correo').val();
            let sexo=$('#sexo').val();
            let adicional=$('#adicional').val();
            funcion='editar_usuario';
            $.post('../controller/UsuarioController.php',{funcion,id_usuario,telefono,direccion,correo,sexo,adicional},(response)=>{

                if(response == 'editado'){
                    $('#editado').hide('slow');
                    $('#editado').show(1000);
                    $('#editado').hide(2000);
                    $('#form-usuario').trigger('reset');
                }
                edit=false;
                buscar_usuario(id_usuario);
            })
        }
        else{
            $('#noeditado').hide('slow');
            $('#noeditado').show(1000);
            $('#noeditado').hide(2000);
            $('#form-usuario').trigger('reset');
        }
        e.preventDefault();
    });

    $('#form-pass').submit(e=>{
        let oldpass=$('#oldpass').val(); 
        console.log(id_usuario);
        let newpass=$('#newpass').val();
        funcion = 'cambiar_pass';
        $.post('../controller/UsuarioController.php',{id_usuario,funcion,oldpass,newpass},(response)=>{

            if(response == 'update'){
                $('#pass-correct').hide('slow');
                $('#pass-correct').show(1000);
                $('#pass-correct').hide(2000);
                $('#form-pass').trigger('reset');
            }else{
                $('#pass-fail').hide('slow');
                $('#pass-fail').show(1000);
                $('#pass-fail').hide(2000);
                $('#form-pass').trigger('reset');
            }
        })
        e.preventDefault();
    });

    $('#form-photo').submit(e=>{
        let formData = new FormData($('#form-photo')[0]);
        $.ajax({
            url: '../controller/UsuarioController.php',
            type:'POST',
            data:formData,
            cache:false,
            processData: false,
            contentType: false
        }).done(function(response){
            const usuario = JSON.parse(response);
            if(usuario.alert == 'edit'){
                $('#foto_avatar').attr('src',usuario.ruta);
                $('#photo-correct').hide('slow');
                $('#photo-correct').show(1000);
                $('#photo-correct').hide(2000);
                $('#form-photo').trigger('reset');
                buscar_usuario(id_usuario);
            }else{
                $('#photo-fail').hide('slow');
                $('#photo-fail').show(1000);
                $('#photo-fail').hide(2000);
                $('#form-photo').trigger('reset');
            }
        });
        e.preventDefault();
    })    
})