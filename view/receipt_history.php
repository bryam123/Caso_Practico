<?php
session_start();
if($_SESSION['us_tipo'] == 1 ){

include_once "Layouts/header.php";
?>
  <title>Caso Práctico - Apuestas Deportivas</title>
  <style>
    .border-edit{
      border: 1px solid #3E938F;
      border-radius: 10px;
    }
  </style>
<?php
include_once "Layouts/nav.php";
?>
<!-- eliminar -->
<div class="modal fade" id="eliminar_recibo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="card card-danger">
              <div class="card-header">
                  <h3 class="card-title">Ventana de confirmación</h3>
                  <button data-dismiss="modal" aria-label="close" class="close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <form action="" id="form-eliminar-recibo">
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
<!-- Modal editar Usuario-->
<div class="modal fade" id="editar_recibo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="" id="form_editar">
        <div class="modal-header" style="background: #3C8DBC;">
          <h5 class="modal-title text-white">Editar Recibo</h5>
          <button type="button" class="btn-close" id="Cerrar" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <input type="hidden" id="id_editar">
            <div class="row">
                <div class="col form-group">
                  <label for="">Fecha</label>
                  <input type="text" id="fecha_rec" class="form-control" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col form-group">
                  <label for="">Canal de comunicacion</label>
                  <select id="can_com_rec" class="form-select" required>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="TeleGram">TeleGram</option>
                  <select>
                </div>
            </div>
            <div class="row">
                <div class="col-6 form-group">
                  <label for="">Banco</label>
                  <input type="text" id="ban_rec" min="1900" class="form-control">
                </div>
                <div class="col-6 form-group">
                  <label for="">Monto ingresado</label>
                  <input type="text" id="mon_ing_rec"class="form-control">
                </div>
            </div>          
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Editar</button>
        </div>
        </form>
    </div>
    </div>
</div>

  <!-- Comienzo del contenido -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mt-4 mb-3 portada">
          <div class="col-sm-4 text-right">
            <div class="unjbg-logo"><img class="" src="../assets/img/UNJBG.png" alt="" width="80xp" height="80px"></div>
          </div>
          <div class="col-sm-7 pt-1 text-left">
          <div class="unjbg-texto"><b class="fs-3" style ="font-family:courier,arial,helvética;">Caso practico</b></div>
        </div>
        </div>
        <div class="row text-center" style= "color: #3E938F;">
            <b class="fs-3 p-0" style ="font-family:Helvetica, sans-serif;">Billetera Virtual</b>
        </div>
      </div><!-- /.container -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
      <!--Ficha de Antecedentes Ocupacionales-->
      <b class="fs-5" style ="font-family:Helvetica, sans-serif; color: #3E938F;">Antecedentes Billetera</b>
        <div class="row mb-3 mt-3" style= "color: #3E938F;">
            <card class="border-edit">
              <div class="card-body">
                <form action="" id="">
                  <input type="hidden" id="dni" value="<?php if(!empty($_GET['dni'])){ $dni=$_GET['dni']; echo $dni;}?>">
                  <input type="hidden" id="id_fam" >
                <!-- Datos del jugador -->
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="">Nombres: </label>
                            <input type="text" maxlength="300" id="nombre_jug" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="">Monto actual: </label>
                            <input type="text" maxlength="300" id="monto_act" class="form-control" required>
                        </div>
                    </div>
                                    
              </div>
            </card>
        </div>
      
      <!-- tabla de datos-->
      <div class="row pb-4" style= "color: #3E938F;">
      <card class="border-edit">
        <div class="card-body">
        <div class="row">
            <b>Historial</b>
            <div class="table-responsive">
            <table class="table table-bordered table-sm table-hover mt-2" style="border: solid;" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th class="bg-lightblue align-middle text-center" scope="col" width="3%">#</th>
                    <th class="bg-lightblue align-middle text-center" scope="col" width="32%">Fecha</th>
                    <th class="bg-lightblue align-middle text-center" scope="col" width="22%">Canal de comunicacion</th>
                    <th class="bg-lightblue align-middle text-center" scope="col" width="22%">Banco</th>
                    <th class="bg-lightblue align-middle text-center" scope="col" width="13%">Monto ingresado</th>
                    <th class="bg-lightblue align-middle text-center" scope="col" width="8%"></th>
                  </tr>
                </thead>
                <tbody id="table_recibo" class="text-dark text-center bg-white">
                </tbody>
            </table>
            </div>
          </div>
        </div>
      </card>
      </div>      
      <!-- botones -->
        <div class="row pb-4" style= "color: #3E938F;">
        <card class="border-edit">
            <div class="card-body">
              <a href="sales_promoter_manager.php" class="float-left"><i class="fas fa-angle-double-left"></i><i class="fas fa-angle-double-left mr-1"></i>Anterior</a>
            </div>
          </card>
        </div>
        </form>
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
<script src="../js/receipts.js"></script> 
<script>
  function editar(id){
    funcion="buscar_datos_editar";
    $.post('../controller/ControllerPlayer.php',{funcion,id},(response)=>{
      const usuario = JSON.parse(response);
      $('#id_editar').val(usuario.id_rec);
      $('#fecha_rec').val(usuario.fecha_rec);
      $('#can_com_rec').val(usuario.can_com_rec);
      $('#ban_rec').val(usuario.ban_rec);
      $('#mon_ing_rec').val(usuario.mon_ing_rec);
    })
  }

  function eliminar(id){
    $('#eliminar_user').val(id);    
  }
</script>