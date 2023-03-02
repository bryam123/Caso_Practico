<?php
session_start();
if($_SESSION['us_tipo'] == 1 ){

include_once "Layouts/header.php";
?>
  <title>Caso Práctico - Apuestas Deportivas</title>
<?php
include_once "Layouts/nav.php";
?>


<!-- Modal ficha-->
<div class="modal fade" id="eliminar-ficha-recibo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="card card-danger">
              <div class="card-header">
                  <h3 class="card-title">Ventana de confirmacion</h3>
                  <button data-dismiss="modal" aria-label="close" class="close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="" id="form-eliminar">
                <div class="card-body">
                  <b class="text-dark">¿Estas seguro que quieres eliminar este usuario?</b> 
                  <input type="hidden" id="eliminar_user">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger float-right"  style="border-radius: 60px; font-family:Tahoma, sans-serif;"><i class="fas fa-check mr-2"></i>Confirmar</button>
                    <button type="button" class="btn btn-outline-secondary float-right mr-2" data-dismiss="modal"  style="border-radius: 60px; font-family:Tahoma, sans-serif;">Cerrar</button>
                </div>
              </form>
          </div>      
      </div>
    </div>
  </div>

  <!-- Comienzo del contenido -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header m-0 p-0">
      <div class="container-fluid bg-white pt-2 pl-3 mb-2 border-bottom">
        <div class="row mb-2">
          <div class="col-sm-6 pb-1">
            <h1>Recibos Jugadores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Recibos</li>
            </ol>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <!-- Tabla -->
          <div class="col-sm-9 col-12">
          <div class="card">
            <div class="card-header">
            <input type="hidden" id="valor" value="<?php if(!empty($_GET['valor'])){ echo $_GET['valor']; } ?>">
            <form action="" id="form-nuevo-medico">
              <div class="input-group">
                  <input type="text" id="dni_tra" name="dni_tra" class="form-control" minlength="8" maxlength="8"  placeholder="Ingrese DNI del jugador" required pattern="^[0-9]{8}">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#Editar_ficha">New recibo<i class="ml-1 fas fa-plus-circle"></i></button>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
              <table id="medico" class="table table-bordered table-sm table-hover" cellspacing="0" width="100%">
                <thead class="text-center bg-lightblue">
                  <tr>
                    <th width="5%">#</th>
                    <th width="14%">DNI</th>
                    <th width="45%">Nombres</th>
                    <th width="13%">Fecha</th>
                    <th width="13%">Monto</th>
                    <th width="10%"></th>
                  </tr>
                </thead>
                <tbody class="text-center" id="tabla_datos">
                </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>

          <!-- Marcadores-->
          <div class="col-sm-3 col-12">
          <div class="card">
            <div class="card-body">
            <section class="content">
            <div class="container-fluid">
              <div class="row flex">
                <div class="col-12">
                <div class="small-box" style="background: #6297BE;">
                    <div class="inner">
                      <h3 id="total_personas">0</h3>
                      <p>Total personas</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-users text-white"></i>
                    </div>
                    <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
              </div>
            </div><!-- /.container-fluid -->
          </section>
            </div>
          </div>
          </div>
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
<script src="../js/player_receipt.js"></script>
<script>
  function editar_recibo(id){
    window.location.href = "data_receipt_player.php?dni="+id;
  }

  function eliminar_recibo(id){
    $('#eliminar_user').val(id);
  }
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
      
    
 
        
</script>

