 
 <!-- /.Footer -->
 <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2023.</strong> Todos los derechos reservados.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar --> 
</div>

<!-- jQuery -->
<script src="../js/jquery.min.js"></script>
<!-- jQuery -->
<script src="../js/bootstrap.js"></script>
<!-- select -->
<script src="../js/select2.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../js/Chart.js"></script>
<!-- jQuery -->
<script src="../js/datatables.min.js"></script>
<!-- extension responsive -->
<script src="../js/dataTables.responsive.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../js/demo.js"></script>
<!-- Toastr -->
<script src="../js/toastr.min.js"></script>

<!-- Para la fotito -->
<script type="text/javascript">
    function SoloTexto(event){
      var key = event.keyCode;
      return ((key >= 65 && key <= 90) || (event.keyCode > 96 && event.keyCode < 123) || key == 8 || key == 241 || key==32 || (key >= 192 && key <= 255) );
    };
    function Upper(el){
      let p=el.selectionStart;el.value=el.value.toUpperCase();el.setSelectionRange(p, p);
    }
    var login = $('#id_login_us').val();
    buscar_usuario(login);
    function buscar_usuario(dato){
    funcion="buscar_usuario"; 
    $.post('../controller/UsuarioController.php',{funcion,dato},(response)=>{

      let avatar ='';
      const usuario = JSON.parse(response);
      avatar = `${usuario.avatar}`;
      $('#foto_avatar4').attr('src',avatar);
    })      
  } 
</script>
</body>
</html>