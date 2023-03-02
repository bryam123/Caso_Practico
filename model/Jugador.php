<?php
include_once '../model/conexion.php';


class Jugador
{
	var $jugador;	
	public function __construct()
	{
		$db = new Conexion();
		$this->acceso = $db->pdo;
	}
	function verificar($dni){
        $sql="SELECT * FROM apostador WHERE dni_apo=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni));
        $this->objetos = $query->fetchAll();
        if(!empty($this->objetos)){
            echo 'Existe';
        }else{
            echo 'NoExiste';
        }
    }
	function mostrar(){
        $sql="SELECT * FROM apostador";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

	
	function buscar_jugador($dni){
        $sql = "SELECT * FROM apostador WHERE dni_apo =:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
        
        
    }
    function buscar_recibos($dni){
		$sql="SELECT * FROM registros_recibos INNER JOIN apostador on registros_recibos.id_apo=apostador.id_apo WHERE id_reg_rec=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
	function crear_jugador($dni,$nombre,$paterno,$materno,$nacimiento,$edad,$domicilio,$telefono,$genero,$correo)
	{
		$sql = "SELECT * FROM apostador WHERE dni_apo=:dni";
		$query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni));
        $this->objetos = $query->fetchAll();
        if(empty($this->objetos)){
            $sql = "INSERT INTO apostador(nom_apo, ape_pat_apo, ape_mat_apo, nac_apo, eda_apo, dni_apo, gen_apo, dom_apo, cor_apo, tel_apo) VALUES (:nombre,:paterno,:materno,:nacimiento,:edad,:dni,:genero,:domicilio,:correo,:telefono)";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':paterno'=>$paterno,':materno'=>$materno,':nacimiento'=>$nacimiento,':edad'=>$edad,':dni'=>$dni,':genero'=>$genero,':domicilio'=>$domicilio,':correo'=>$correo,':telefono'=>$telefono));
            echo 'Agregado';
        }else{
            echo 'Existe';
        }

	}
	function cambiar_foto($dni,$foto){
        $sql = "SELECT * from apostador Where dni_apo=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni,));
        $this->objetos = $query->fetchAll();
        if(!empty($this->objetos)){
            $sql = "UPDATE apostador SET ava_apo=:foto where dni_apo=:dni";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':dni'=>$dni,':foto'=>$foto));
            return $this->objetos;
        }else{
            echo 'noupdate';
        }
    }
    function editar_trabajador($dni,$nombre,$paterno,$materno,$nacimiento,$edad,$domicilio,$telefono,$genero,$correo){
    $sql = "UPDATE `apostador` SET `nom_apo`=:nombre,`ape_pat_apo`=:paterno,`ape_mat_apo`=:materno,`nac_apo`=:nacimiento,`eda_apo`=:edad,`gen_apo`=:genero,`dom_apo`=:domicilio,`cor_apo`=:correo,`tel_apo`=:telefono WHERE `dni_apo`=:dni";
    $query = $this->acceso->prepare($sql);
    $query->execute(array(':nombre'=>$nombre,':paterno'=>$paterno,':materno'=>$materno,
    ':nacimiento'=>$nacimiento,':edad'=>$edad,':dni'=>$dni,':genero'=>$genero,':domicilio'=>$domicilio,
    ':correo'=>$correo,':telefono'=>$telefono));
        
        echo 'Editado';
    
    }

    function editar_foto($dni,$foto){
        $sql = "SELECT ava_apo from apostador Where dni_apo=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni,));
        $this->objetos = $query->fetchAll();
        if(!empty($this->objetos)){
            foreach($this->objetos as $objeto){
                unlink('../assets/img/'.$objeto->ava_apo);
            }
            $sql = "UPDATE apostador SET ava_apo=:foto where dni_apo=:dni";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':dni'=>$dni,':foto'=>$foto));
            return $this->objetos;
        }else{
            $sql = "UPDATE apostador SET ava_apo=:foto where dni_apo=:dni";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':dni'=>$dni,':foto'=>$foto));
            return $this->objetos;
        }
    }

    function ver_perfil($id){
        $sql = "SELECT * FROM apostador WHERE id_apo=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function cantidad_personas(){
        $sql = "SELECT COUNT(*) as personas from apostador";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

     function cantidad_comprobantes(){
        $sql = "SELECT COUNT(*) as comprobantes from registros_recibos";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function recibo($id_emp,$id_tra,$ficha,$can_com,$ban_rec,$mon_re)
    {
    	if ($ficha==0) {
    		$sql = "INSERT INTO `registros_recibos`(`id_pro`, `id_apo`, `can_cum_reg`, `ban_reg`, `monto_reg`) VALUES (:id_emp,:id_tra,:can_com,:ban_rec,:mon_re)";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id_emp'=>$id_emp,':id_tra'=>$id_tra,':can_com'=>$can_com,':ban_rec'=>$ban_rec,':mon_re'=>$mon_re));
            echo 'Editado';
    	} else {
    		$sql = "UPDATE `registros_recibos` SET `can_cum_reg`=:can_com,`ban_reg`=:ban_rec ,`monto_reg`=:mon_re WHERE `id_reg_rec`=:ficha";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':ficha'=>$ficha,':can_com'=>$can_com,':ban_rec'=>$ban_rec,':mon_re'=>$mon_re));
            echo 'Editado';
    	}
    	
    }
    function buscar_datos()
    {
    	$sql = "SELECT * FROM `registros_recibos` INNER JOIN apostador on registros_recibos.id_apo=apostador.id_apo";
        $query = $this->acceso->prepare($sql);
        $query->execute();
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function eliminar_recibo($id)
    {
    	$sql = 'DELETE FROM `registros_recibos` WHERE `id_reg_rec`=:id';
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        echo 'eliminado';
    }
    function historial($dni){
 
        $sql = "SELECT * from registros_recibos inner JOIN apostador on apostador.id_apo=registros_recibos.id_apo Where apostador.dni_apo =:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function buscar_datos_editar($id)
    {
    	$sql = "SELECT * FROM `registros_recibos` WHERE `id_reg_rec`=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos = $query->fetchAll();
        return $this->objetos;    }
       function recibo_His($id_fic_rec,$fecha,$can_com,$ban_rec,$mon_re)
    {
    	
    		$sql = "UPDATE `registros_recibos` SET `can_cum_reg`=:can_com,`ban_reg`=:ban_rec ,`monto_reg`=:mon_re WHERE `id_reg_rec`=:ficha";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':ficha'=>$id_fic_rec,':can_com'=>$can_com,':ban_rec'=>$ban_rec,':mon_re'=>$mon_re));
            echo 'Editado';
    }
}
?>