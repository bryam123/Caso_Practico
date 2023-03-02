<?php
session_start();
if($_SESSION['us_tipo'] == 1 ){
  $dni = $_GET['dni'];
  
  if(!empty($_GET['dni'])){ 
    $dni=$_GET['dni']; 
    $cantidadCarac=strlen($dni);
  };

include_once "layouts/header.php";
?>
  <title>Caso Práctico - Apuestas Deportivas</title>
  <style>
    .border-edit{
      border: 1px solid #3E938F;
      border-radius: 10px;
    }
  </style>
<?php
include_once "layouts/nav.php";
?>

  <!-- Comienzo del contenido -->
  <div class="content-wrapper blanco">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container">
        <div class="row mt-4 mb-3 portada">
          <div class="col-sm-4 text-right">
            <div class="unjbg-logo"><img class="" src="../assets/img/UNJBG.png" alt="" width="80xp" height="80px"></div>
          </div>
          <div class="col-sm-7 pt-1 text-left">
          <div class="unjbg-texto"><b class="fs-3" style ="font-family:courier,arial,helvética;">Datos del jugador y Datos del recibo</b></div>
        </div>
        </div>
        <div class="row text-center" style= "color: #3E938F;">
            <b class="fs-3 p-0" style ="font-family:Helvetica, sans-serif;"></b>
        </div>
      </div><!-- /.container -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container">
      <!--Ficha Filiacion del jugador-->
        <div class="row mb-4" style= "color: #3E938F;">
            <b class="fs-5 mb-2" style ="font-family:Helvetica, sans-serif;"><i class="fas fa-user-alt mr-2"></i>Jugador (*)</b>
            <card class="border-edit">
            <form action="" id="form-trabajador">
              <input type="hidden" name="funcion" value="editar_photo">
              <div class="card-body">
                 <!-- Datos del jugador -->
                 <div class="row">
                    <div class="form-group col-sm-8">
                        <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="">Documento de Identidad: (*)</label>
                            <input type="hidden" id="ficha_m" name="ficha_m" value="<?php echo $dni ?>">
                            <input type="hidden" id="ficha" name="ficha">
                            <input type="hidden" id="us_tipo" name="us_tipo">
                            <input type="hidden" id="id_jug" name="id_jug">
                            <input type="text" id="dni_tra" name="dni_tra" class="form-control" readonly pattern="[0-9]{8}" title="Solo números">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="">Dinero Actual: </label>
                            <input type="text" id="dim_act" name="dim_act" class="form-control" readonly >
                        </div>
                      </div>
                    </div>
                  </div>                            

                  <div class="row">
                    <div class="form-group col-sm-12">
                      <label for="">Nombres: </label>
                      <input type="text" id="nombre_tra" maxlength="40" class="form-control" onkeypress="return SoloTexto(event);" oninput="Upper(this);" required pattern="^[a-zA-ZÀ-ÿ\s]*" title="Solo letras" readonly>
                    </div>                        
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="">Apellido Paterno : </label>
                        <input type="text" id="paterno_tra" maxlength="20" class="form-control" onkeypress="return SoloTexto(event);" oninput="Upper(this);" required pattern="^[a-zA-ZÀ-ÿ\s]*" title="Solo letras" readonly>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="">Apellido Materno : </label>
                        <input type="text" id="materno_tra" maxlength="20" class="form-control" onkeypress="return SoloTexto(event);" oninput="Upper(this);" required pattern="^[a-zA-ZÀ-ÿ\s]*" title="Solo letras" readonly>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="">Domicilio Fiscal:</label>
                        <input type="text" id="domicilio_tra" maxlength="100" oninput="Upper(this);"class="form-control" placeholder="Domicilio Fiscal" readonly> 
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="">Teléfono:</label>
                        <input type="text" id="telefono_tra" minlength="9" maxlength="9" class="form-control" readonly pattern="^[0-9]+" title="Solo números">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">Correo Electrónico:</label>
                        <input type="email" id="correo_tra" maxlength="50" class="form-control" readonly>
                    </div>
                  </div>  
                  <div class="row">
                     <b class="p-0 ml-2 mb-2">Datos de Recepción</b>
                    <div class="form-group col-sm-4">
                        <label for="">Canal de comunicación</label>
                        <select type="text" id="can_com" class="form-select" required>
                          <option selected></option>
                          <option value="WhatsApp">WhatsApp</option>
                          <option value="TeleGram">TeleGram</option>
                        </select> 
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">Banco:</label>
                        <input type="text" id="ban_rec" maxlength="50" class="form-control" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="">Monto de recibo:</label>
                        <input type="text" id="mon_re" name="mon_re" class="form-control"  title="Solo números">                      
                    </div>
                  </div>          
              </div>
            </card>
        </div>

      <!-- botones -->
        <div class="row pb-4" style= "color: #3E938F;">
        <card class="border-edit">
            <div class="card-body">
              <a href="receipt_manager.php" class="float-left"><i class="fas fa-angle-double-left"></i><i class="fas fa-angle-double-left mr-1"></i>Anterior</a>
              <button type="submit" class="btn btn-danger float-right"  style="border-radius: 60px; font-family:Tahoma, sans-serif;"><i class="far fa-file-pdf mr-2"></i>Guardar</button>
            
            </div>
          </card>
        </div>
    </form>
      </div> 
    </section>
  </div>
  <!-- Final contenido-->
 <?php
include_once "layouts/footer.php";
}else{
    header('Location: ../index.php');
}
?>
<script src="../js/apostador.js"></script>


