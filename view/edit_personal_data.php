<?php
session_start();
if($_SESSION['us_tipo'] == 1 ){

include_once "layouts/header.php";
?>
  <title>Caso Práctico - Apuestas Deportivas</title>
<?php
include_once "layouts/nav.php";
?>
<!-- Modal  Contraseña-->
<div class="modal fade" id="cambio_contra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Cambiar Contraseña</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img id="foto_avatar3" src="../assets/img/Doctor.png" class="profile-user-img img-fluid img-circle" alt="">
        </div>
        <div class="text-center m-2">
          <b>
            <?php 
              echo $_SESSION['nombre'];      
            ?>
          </b>
        </div>
        <form id="form-pass">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-unlock"></i></span>
                </div>
                <input type="password" id="oldpass" class="form-control" placeholder="Ingrese contraseña actual">
            </div>
            <div class="alert alert-danger text-center" id="pass-fail" style="display:none;">
              <span><i class="fas fa-times mr-1"></i>El password no el correcto!!</span>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-lock"></i></span>
              </div>
              <input type="text" id="newpass" class="form-control" placeholder="Ingrese contraseña nueva">
            </div>
            <div class="alert alert-success text-center m-1" id="pass-correct" style="display:none;">
              <span><i class="fas fa-check mr-1"></i>Contraseña Cambiada Correctamente!!</span>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn bg-gradient-primary">Guardar</button>
        </form>
      </div>
    </div>
    </div>
  </div>
</div>

<!-- Modal foto-->
<div class="modal fade" id="cambiofoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-primary" id="exampleModalLabel"><b>Cambiar Avatar</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <img id="foto_avatar" src="../assets/img/Doctor.png" class="profile-user-img img-fluid img-circle" alt="">
        </div>
        <div class="text-center m-2">
          <b>
            <?php 
              echo $_SESSION['nombre'];      
            ?>
          </b>
        </div>
        <form id="form-photo" enctype="multipart/form-data">
            <div class="input-group mb-3 ml-5">
              <input type="file" name="photo" class="input-group">
              <input type="hidden" name="funcion" value="cambiar_foto">
            </div>
            <div class="alert alert-success text-center" id="photo-correct" style="display:none;">
              <span><i class="fas fa-check mr-1"></i>Avatar cambiado correctamente!!</span>
            </div>
            <div class="alert alert-danger text-center" id="photo-fail" style="display:none;">
              <span><i class="fas fa-times mr-1"></i>Error en el formato del Avatar!!</span>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn bg-gradient-primary">Guardar</button>
        </form>
      </div>
    </div>
    </div>
  </div>
</div>


  <!-- COMIENZO DEL CONTENIDO -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Datos Personales</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
              <li class="breadcrumb-item active">Datos Personales</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
            <!-- /.Perfil 1 - Datos generales-->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img id="foto_avatar2" src="../assets/img/Doctor.png" class="profile-user-img img-fluid img-circle">
                  </div>
                  <div class="text-center mt-1">
                    <button type="button" data-toggle="modal" data-target="#cambiofoto" class="btn btn-success btn-sm">Cambiar Avatar</button>
                  </div>
                  <input id="id_usuario" type="hidden" value="<?php echo $_SESSION['usuario'];?>">
                  <h3 id="nombre_us" class="profile-username text-center text-primary">Nombre</h3>
                  <p class="text-dark text-center" id="apellidos_us">Apellidos</p>
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item tex-center">
                         <b style="color: #2285F2";>DNI</b><a href="" class="float-right text-dark" id="dni_us">--</a>
                      </li>
                       <li class="list-group-item tex-center">
                        <b style="color: #2285F2";>Edad</b><a href="" class="float-right text-dark" id="edad_us">--</a>
                       </li>
                       <li class="list-group-item tex-center">
                        <b style="color: #2285F2";>Tipo de usuario</b><span class="float-right" id="tipo_us">administrador</span>
                       </li>           
                       <button type="button" class="btn btn-block btn-outline-warning btn-sm" data-toggle="modal" data-target="#cambio_contra">Cambiar Contraseña</button>
                    </ul>
                </div>
              </div>
            <!-- /.Perfil 2 - datos Especificos -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Informacion:</h3>
                </div>
                <div class="card-body">
                  <strong style="color: #2285F2";><i class="fas fa-phone mr-1"></i>Teléfono</strong>
                  <p id="telefono_us" class="text-muted">--</p>
                  <strong style="color: #2285F2";><i class="fas fa-map-marker-alt mr-1"></i>Dirección</strong>
                  <p id="direccion_us" class="text-muted">--</p>
                  <strong style="color: #2285F2";><i class="fas fa-at mr-1"></i>Correo</strong>
                  <p id="correo_us" class="text-muted">--</p>
                  <strong style="color: #2285F2";><i class="fas fa-smile-wink mr-1"></i>Sexo</strong>
                  <p id="sexo_us" class="text-muted">---</p>
                  <strong style="color: #2285F2";><i class="fas fa-pencil-alt mr-1"></i>Información adicional</strong>
                  <p id="adicional_us" class="text-muted">---</p>
                  <button class="edit btn btn-block bg-gradient-danger">Editar</button>
                </div>
                <div class="card-footer">
                  <p class="text-muted text-center">Click en boton si desea EDITAR</p>
                </div>
              </div>  
            </div>
            <!-- /.Formulario-->
            <div class="col-md-9">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Editar Datos Personales</h3>
                </div>
                <div class="card-body">
                  <div class="alert alert-success text-center" id="editado" style='display:none;'>
                    <span><i class="fas fa-check mr-1">Se ha registrado los datos correctamente!!</i></span>
                  </div>
                  <div class="alert alert-danger text-center" id="noeditado" style='display:none;'>
                    <span><i class="fas fa-times mr-1"></i>Edicion deshabilidata!!</span>
                  </div>
                  <form class="form-horizontal" id="form-usuario">
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Teléfono</label>
                      <div class="col-sm-10">
                      <input type="number" id="telefono" class="form-control">
                      </div>                     
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Dirección</label>
                      <div class="col-sm-10">
                      <input type="text" maxlength="50" id="direccion" class="form-control">
                      </div>                     
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Correo</label>
                      <div class="col-sm-10">
                      <input type="email" maxlength="50" id="correo" class="form-control">
                      </div>                     
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Sexo</label>
                      <div class="col-sm-10">
                      <select class="form-select" id="sexo" aria-label="Default select example">
                        <option selected></option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                      </select>
                      </div>                     
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Información adicional</label>
                      <div class="col-sm-10">
                        <textarea type="text" maxlength="300" name="" id="adicional" cols="30" rows="10" class="form-control"></textarea>
                      </div>                  
                    </div>
                    <div class="from-group row">
                      <div class="offset-sm-2 col-sm-10 float-right">
                        <button type="submit" class="btn btn-block btn-outline-primary">Guardar</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="card-footer">
                  <p class="text-danger offset-sm-2">Cuidado Con ingresar datos erroneos!!</p>
                </div>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
 </div>
 <?php
include_once "layouts/footer.php";

}else{
    header('Location: ../index.php');
}
?>
<script src="../js/usuario.js"></script>
