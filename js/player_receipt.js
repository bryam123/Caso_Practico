$(document).ready(function(){
    var funcion;
    var total;

    buscar_datos();
    //cantidad_personas();
    //cantidad_examenes();
   
    

    $('#form-nuevo-medico').submit(e=>{
        funcion = "mandar_datos";
        let dni = $('#dni_tra').val(); 
        $.post('../controller/ControllerPlayer.php',{funcion,dni},(response)=>{
            console.log(response);
            if(response == 'Existe'){
                window.location.href = '../view/data_receipt_player.php?dni='+dni;
            }else{
                toastr.error('El usuario no existe.');
            }
        })
        e.preventDefault();
    })
    function buscar_datos(){
        funcion="buscar_datos";
        $.post('../controller/ControllerPlayer.php',{funcion},(response)=>{
           // console.log(response);
            const usuario = JSON.parse(response);
            contador = 0;
            cadena = "";
            usuario.forEach(data=>{
                contador++;
                cadena +="<tr>";
                cadena += "<td>"+contador+"</td>";
                cadena += "<td>"+data.dni+"</td>";
                cadena += "<td>"+data.nombres+"</td>";
                cadena += "<td>"+data.fecha+"</td>";
                cadena += "<td>"+data.Monto+"</td>";
                cadena += `<td>`; 
                cadena +=`
                        <button class='btn btn-info btn-xs' onclick="editar_recibo(`+data.id_fic+`)"><i class='fas fa-edit'></i></button>
                        <button class='btn btn-warning btn-xs' data-toggle='modal' data-target='#eliminar-ficha-recibo' onclick="eliminar_recibo(`+data.id_fic+`)"><i class='fas fa-trash'></i></button>
                        `;
                cadena +=`</td>`;
                cadena +="</tr>";
            });
            $('#tabla_datos').html(cadena);
        })        
    }

    $('#form-eliminar').submit(e=>{
        funcion="eliminar_recibo";
        let id = $('#eliminar_user').val();
        //console.log(id);
        $.post('../controller/ControllerPlayer.php',{funcion,id},(response)=>{
           // console.log(response);
            if(response == 'eliminado'){
              $("#eliminar-ficha-recibo .close").click();    
              toastr.success('Recibo eliminado con exito.');
              buscar_datos();
            }
        })
        e.preventDefault(); 
    })

    function cantidad_personas(){
        let funcion = 'cantidad_personas';
        $.ajax({
          url: '../controller/ControllerPlayer.php',
          type: 'POST',
          data: {funcion:funcion},
        }).done(function(resp){
          const usuario = JSON.parse(resp);
          total = usuario.personas;
          $('#total_personas').html(total);
        })
      }

      function cantidad_examenes(){
        let funcion = 'cantidad_examenes';
        $.ajax({
          url: '../controller/ControllerPlayer.php',
          type: 'POST',
          data: {funcion:funcion},
        }).done(function(resp){
          const usuario = JSON.parse(resp);
          $('#total_examenes').html(usuario.examenes);
          num = total - usuario.examenes;
          $('#sin_examenes').html(num);
        })
      }  
})