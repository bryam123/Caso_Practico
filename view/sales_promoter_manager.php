<?php
session_start();
if($_SESSION['us_tipo'] == 1 ){
include_once "Layouts/header.php";
?>
  <title>Caso Práctico - Apuestas Deportivas</title>
<?php
include_once "Layouts/nav.php";
?>

<!-- Modal Visualizar Usuario-->
<div class="modal fade" id="visualizar_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="card card-primary" id="perfil">
        </div>
        </div>      
    </div>
</div>



<!-- Modal Crear usuario-->
<div class="modal fade" id="crear_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Crear un nuevo Usuario</h3>
                <button data-dismiss="modal" aria-label="close" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-crear-usuario" action="">
            <div class="card-body">
                 <!-- Datos del jugador -->
                  <div class="row">
                    <div class="form-group col-sm-8">
                      <div class="row">
                        <div class="form-group col-sm-12">
                          <label for="">Nombres: (*)</label>
                          <input type="text" id="nombre_tra" maxlength="40" name="nombre" onkeypress="return SoloTexto(event);" oninput="Upper(this);" class="form-control" required pattern="^[a-zA-ZÀ-ÿ\s]*" title="Solo letras" placeholder="Ingrese nombre del usuario">  
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="">Apellido Paterno : (*)</label>
                            <input type="text" id="paterno_tra" maxlength="20" name="apellido_p" onkeypress="return SoloTexto(event);" oninput="Upper(this);" class="form-control" required pattern="^[a-zA-ZÀ-ÿ]*" title="Solo letras" placeholder="Ingrese apellido parterno del usuario">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">Apellido Materno : (*)</label>
                            <input type="text" id="materno_tra" maxlength="20" name="apellido_m" onkeypress="return SoloTexto(event);" oninput="Upper(this);" class="form-control" required pattern="^[a-zA-ZÀ-ÿ]*" title="Solo letras" placeholder="Ingrese apellido materno del usuario">
                        </div>
                      </div>
                    </div>
                     <div class="form-group col-sm-4">
                        <label for="">Avatar:</label>
                        <input type="hidden" name="funcion" value="photo_crear">
                        <input type="file"  name="photo" class="form-control" id="avatar_tra">
                        <div class="text-center pt-2">
                          <img id="foto_avatar" src="../assets/img/default.jpg" class="profile-user-img img-fluid img-circle" alt="">
                        </div>  
                      </div>
                  </div>            
                  <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="">Documento de Identidad: (*)</label>
                        <input type="text" id="dni_tra" name="dni_tra" class="form-control" minlength="8" maxlength="8" required pattern="[0-9]{8}" title="Solo números" placeholder="Ingrese DNI">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="">Fecha de Nacimiento: (*)</label>
                        <input type="date" id="nacimiento_tra" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="">Edad:</label>
                        <input type="text" id="edad_tra" class="form-control" disabled>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="">Genero: (*)</label>
                        <select type="text" id="genero_tra" class="form-select" required>
                          <option selected></option>
                          <option value="Masculino">Masculino</option>
                          <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="">Domicilio Fiscal: (*)</label>
                        <input type="text" id="domicilio_tra" maxlength="100" name="domicilo" oninput="Upper(this);" class="form-control" required placeholder="Ingrese el domicilio del usuario">
                    </div>
                  </div>  
                  <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="">Teléfono: (*)</label>
                        <input type="text" id="telefono_tra" class="form-control" minlength="9" maxlength="9"  required pattern="^[0-9]+" placeholder="Número de celular" title="Solo números">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">Correo Electrónico: (*)</label>
                        <input type="email" id="correo_tra" maxlength="50" class="form-control" required placeholder="Ingrese Correo Electrónico">
                    </div>
                  </div>            
              </div>
                <div class="alert alert-success text-center" id="add" style="display:none;">
                  <span><i class="fas fa-check mr-1"></i>Usuario Creado Correctamente!!</span>
                </div>
                <div class="alert alert-danger text-center" id="no-add" style="display:none;">
                  <span><i class="fas fa-times mr-1"></i>El Usuario ya existe!!</span>
                </div>
              <div class="card-footer">
                <p class="text-danger float-left">Los campos con (*) son obligatorios.</p>
                <button type="submit" class="btn bg-gradient-primary float-right">Guardar</button>
                <button type="button" class="btn btn-outline-secondary float-right mr-2" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>      
    </div>
  </div>
</div>
<!-- Modal Editar usuario-->
<div class="modal fade" id="editar_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Editar Uusuario</h3>
                <button data-dismiss="modal" aria-label="close" class="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-editar-usuario" action="">
            <div class="card-body">
                 <!-- Datos del jugador -->
                  <div class="row">
                    <div class="form-group col-sm-8">
                      <div class="row">
                        <div class="form-group col-sm-12">
                          <label for="">Nombres: (*)</label>
                          <input type="text" id="nombre_tra1" maxlength="40" name="nombre" class="form-control" required pattern="^[a-zA-ZÀ-ÿ\s]*" title="Solo letras">  
                        </div>
                      </div>
                      <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="">Apellido Paterno : (*)</label>
                            <input type="text" id="paterno_tra1" maxlength="20" name="apellido_p" class="form-control" required pattern="^[a-zA-ZÀ-ÿ]*" title="Solo letras">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">Apellido Materno : (*)</label>
                            <input type="text" id="materno_tra1" maxlength="20" name="apellido_m" class="form-control" required pattern="^[a-zA-ZÀ-ÿ]*" title="Solo letras">
                        </div>
                      </div>
                    </div>
                     <div class="form-group col-sm-4">
                        <label for="">Avatar:</label>
                        <input type="hidden" name="funcion" value="photo_crear">
                        <input type="file"  name="photo" class="form-control" id="avatar_tra">
                        <div class="text-center pt-2">
                          <img id="foto_avatar1" src="../assets/img/default.jpg" class="profile-user-img img-fluid img-circle" alt="">
                        </div>  
                      </div>
                  </div>            
                  <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="">Documento de Identidad: (*)</label>
                        <input type="text" id="dni_tra1" name="dni_tra" class="form-control" minlength="8" maxlength="8" readonly pattern="[0-9]{8}" title="Solo números">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="">Fecha de Nacimiento: (*)</label>
                        <input type="date" id="nacimiento_tra1" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="">Edad:</label>
                        <input type="text" id="edad_tra1" class="form-control" disabled>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="">Genero: (*)</label>
                        <select type="text" id="genero_tra1" class="form-select" required>
                          <option selected></option>
                          <option value="Masculino">Masculino</option>
                          <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="">Domicilio Fiscal: (*)</label>
                        <input type="text" id="domicilio_tra1" maxlength="100" name="domicilo" class="form-control" required pattern="^[a-zA-Z0-9À-ÿ\.\s]*">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="">Telefono: (*)</label>
                        <input type="text" id="telefono_tra1" class="form-control" minlength="9" maxlength="9"  required pattern="^[0-9]+" title="Solo números">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">Correo Electronico: (*)</label>
                        <input type="email" id="correo_tra1" maxlength="50" class="form-control" required>
                    </div>
                  </div>               
              </div>
                <div class="alert alert-success text-center" id="add1" style="display:none;">
                  <span><i class="fas fa-check mr-1"></i>Usuario Creado Correctamente!!</span>
                </div>
                <div class="alert alert-danger text-center" id="no-add1" style="display:none;">
                  <span><i class="fas fa-times mr-1"></i>El Usuario ya existe!!</span>
                </div>
              <div class="card-footer">
                <p class="text-danger float-left">Los campos con (*) son obligatorios.</p>
                <button type="submit" class="btn bg-gradient-primary float-right">Editar</button>
                <button type="button" class="btn btn-outline-secondary float-right mr-2" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>      
    </div>
  </div>
</div>

  <!-- Comienzo del contenido -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header m-0 p-0">
      <div class="container-fluid bg-white pt-2 pl-3 mb-3 border-bottom">
        <div class="row mb-2">
          <div class="col-sm-6 pb-1">
            <h1>Panel General</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Administrar Jugadores</li>
            </ol>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section> 
    
    <!-- Marcadores-->
    <section class="content">
      <div class="container-fluid">
        <div class="card pt-3 pl-3 pr-3">
        <div class="row">
          <div class="col-sm-3 col-6">
          <div class="small-box" style="background: #5499C7;">
              <div class="inner">
                <h3 id="total_personas">150</h3>
                <p>Total personas</p>
              </div>
              <div class="icon">
                <i class="fas fa-users text-white"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-sm-3 col-6">
          <div class="small-box " style="background: #85C1E9;">
              <div class="inner">
                <h3 id="comprobantes">150</h3>
                <p>Registro de comprobantes</p>
              </div>
              <div class="icon">
                <i class="fas fa-brain text-white"></i>
              </div>
              <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </div>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
            <button type="button" id="boton-crear" data-toggle="modal" data-target="#crear_usuario" title="Añadir un usuario" class="btn bg-gradient-primary"><i class="fas fa-plus-circle mr-1"></i>Añadir Usuario</button>
        </div>
        <div class="card-body">
          <table id="example" class="table table-bordered  table-sm table-hover text-nowrap  display" cellspacing="0" width="100%">
              <thead class="text-center bg-lightblue">
                <tr>
                  <th>#</th>
                  <th>DNI</th>
                  <th>Nombres y Apellidos</th>
                  <th>Edad</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Género</th>
                  <th>Domicilio</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              </tbody> 
              <tfoot class="text-center bg-lightblue">
                <tr>  
                  <th>#</th>
                  <th>DNI</th>
                  <th>Nombres y Apellidos</th>
                   <th>Edad</th>
                  <th>Telefono</th>
                  <th>Correo</th>
                  <th>Género</th>
                  <th>Domicilio</th>
                  <th></th>
                </tr>
              </tfoot>
          </table>
        </div>
        <div class="card-footer"></div>
      </div>
    </div>
    </section>
  </div>
  <!-- Final contenido-->
 <?php
include_once "Layouts/footer.php";
}else{ 
    header('Location: ../index.php');
}
?>
<script src="../js/jugador.js"></script>
<!--<script src="../js/console_ubigeo.js"></script>-->
<script src="../js/validar_fecha.js"></script> 
<script>
        $(document).ready(function()
        {
            $('.select2').select2();
            
            cantidad_personas();
            comprobantes();
        });

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
      
        function comprobantes(){
        let funcion = 'cantidad_comprobantes';
        $.ajax({
          url: '../controller/ControllerPlayer.php',
          type: 'POST',
          data: {funcion:funcion},
        }).done(function(resp){
            const usuario = JSON.parse(resp);
          $('#comprobantes').html(usuario.comprobantes);
        })
      }
    
 
        function editar_personal(id){
        funcion = "buscar_trabajador";
        $.post('../controller/ControllerPlayer.php',{funcion,id},(response)=>{
        	console.log(response);
            const usuario = JSON.parse(response);
            $('#nombre_tra1').val(usuario.nombre_tra);
            $('#paterno_tra1').val(usuario.paterno_tra);
            $('#materno_tra1').val(usuario.materno_tra);
            $('#nacimiento_tra1').val(usuario.nacimiento_tra);
            $('#dni_tra1').val(usuario.dni_tra);
            $('#edad_tra1').val(usuario.edad_tra);
            $('#domicilio_tra1').val(usuario.domicilio_tra);
            $('#telefono_tra1').val(usuario.telefono_tra);
            $('#genero_tra1').val(usuario.genero_tra);
            $('#correo_tra1').val(usuario.correo_tra);
            $('#foto_avatar1').attr('src','../assets/img/'+usuario.avatar_tra);
        })

     }

     function historial(dni){
      window.location.href = "receipt_history.php?dni="+dni;
     }
  </script>  