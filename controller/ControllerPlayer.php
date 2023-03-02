<?php 
include_once '../model/Jugador.php';
session_start();

$jugador = new Jugador();
if($_POST['funcion'] == 'mandar_datos'){
    $dni = $_POST['dni'];
    $jugador->verificar($dni); 
}

    if($_POST['funcion'] == 'mostrar_datos'){
        $jugador->mostrar(); 
        $json = array();
        foreach($jugador->objetos as $objeto){
            $nombres = $objeto->nom_apo.' '.$objeto->ape_pat_apo.' '.$objeto->ape_mat_apo;
            $json['data'][]=array(
                'id_apo'=>$objeto->id_apo,
                'dni_apo'=>$objeto->dni_apo,
                'nombres_apo'=>$nombres,
                'edad_apo'=>$objeto->eda_apo,
                'telefono_apo'=>$objeto->tel_apo,
                'correo_apo'=>$objeto->cor_apo,
                'genero_apo'=>$objeto->gen_apo,
                'domicilio_apo'=>$objeto->dom_apo,
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }

    if($_POST['funcion']=='buscar_datos'){
        $tipo = $_SESSION['us_tipo'];
        $user = $_SESSION['usuario'];
        $json = array(); 
        $jugador->buscar_datos();        
        if(!empty($jugador->objetos)){
            foreach($jugador->objetos as $objeto){
                $nombres = $objeto->nom_apo.' '.$objeto->ape_pat_apo.' '.$objeto->ape_mat_apo;
                $json[] = array(
                    'id_fic'=>$objeto->id_reg_rec,
                    'dni'=>$objeto->dni_apo,
                    'nombres'=>$nombres,
                    'fecha'=>$objeto->fec_reg,
                    'Monto'=>$objeto->monto_reg,
                );                
            }
            echo json_encode($json);
        }
    }
    if($_POST['funcion']=='eliminar_recibo'){
        $id = $_POST['id'];
        $jugador->eliminar_recibo($id);        
    } 

    if($_POST['funcion'] == 'buscar_trabajador'){
        $dni = $_POST['id'];
        $cantidadT=strlen($dni);
        if ($cantidadT==8) {
            $jugador->buscar_jugador($dni);
        } else {
            $jugador->buscar_recibos($dni);
        }
        
        $json = array();
        foreach($jugador->objetos as $objeto){
            if ($cantidadT==8) {
                $domicilio_tra=$objeto->dom_apo;
                $telefono_tra=$objeto->tel_apo;
                $correo_tra=$objeto->cor_apo;
                $avatar_tra=$objeto->ava_apo;
                $can_com="";
                $ban_rec="";
                $mon_re="";
                $ficha="";
            } else {
                $ficha=$objeto->id_reg_rec;
                $domicilio_tra=$objeto->dom_apo;
                $telefono_tra=$objeto->tel_apo;
                $correo_tra=$objeto->cor_apo;
                $avatar_tra=$objeto->ava_apo;
                $can_com=$objeto->can_cum_reg;
                $ban_rec=$objeto->ban_reg;
                $mon_re=$objeto->monto_reg;
            }
            
            $json[] = array( 
                'id_fic'=>$ficha,
                'id_tra'=>$objeto->id_apo,
                'dim_act'=>$objeto->bil_act_apo,
                'dni_tra'=>$objeto->dni_apo,
                'nombre_tra'=>$objeto->nom_apo,
                'paterno_tra'=>$objeto->ape_pat_apo,
                'materno_tra'=>$objeto->ape_mat_apo, 
                'nacimiento_tra'=>$objeto->nac_apo,
                'edad_tra'=>$objeto->eda_apo,
                'domicilio_tra'=>$domicilio_tra,
                'telefono_tra'=>$telefono_tra,
                'can_com'=>$can_com,
                'ban_rec'=>$ban_rec,
                'mon_re'=>$mon_re,
                'correo_tra'=>$correo_tra,
                'avatar_tra'=>$avatar_tra,
                'genero_tra'=>$objeto->gen_apo,
                'us_tipo_tra'=>$objeto->us_tip_apo,
                'aviso'=>'ver',
            );
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
    if($_POST['funcion'] == 'buscar_trabajadores'){
        $dni = $_POST['id'];
        $jugador->buscar_trabajadores($dni);
        $json = array();
        foreach($jugador->objetos as $objeto){
            $json[] = array(
                'id_tra'=>$objeto->id_tra,
                'dni_tra'=>$objeto->dni_tra,
                'nombre_tra'=>$objeto->nombre_tra,
                'paterno_tra'=>$objeto->paterno_tra,
                'materno_tra'=>$objeto->materno_tra, 
                'nacimiento_tra'=>$objeto->nacimiento_tra,
                'edad_tra'=>$objeto->edad_tra,
                'domicilio_tra'=>$objeto->domicilio_tra,
                'lugar_tra'=>$objeto->lugar_tra,
                'n_departamento_tra'=>$objeto->n_departamento_tra,
                'urbanizacion_tra_tra'=>$objeto->urbanizacion_tra,
                'departamento_tra'=>$objeto->departamento_tra, 
                'provincia_tra'=>$objeto->provincia_tra,
                'distrito_tra'=>$objeto->distrito_tra,
                'residencia_trabajo_tra'=>$objeto->residencia_trabajo_tra,
                'tiempo_trabajo_tra'=>$objeto->tiempo_trabajo_tra,
                'entidad_salud_tra'=>$objeto->entidad_salud_tra,
                'seguro_tra'=>$objeto->seguro_tra,
                'telefono_tra'=>$objeto->telefono_tra,
                'correo_tra'=>$objeto->correo_tra,
                'avatar_tra'=>$objeto->avatar_tra,
                'area_trabajo_tra'=>$objeto->area_trabajo_tra,
                'us_tipo_tra'=>$objeto->us_tipo_tra,);
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }

    if($_POST['funcion'] == 'crear_usuario'){
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $paterno = $_POST['paterno'];
        $materno = $_POST['materno'];
        $nacimiento = $_POST['nacimiento'];
        $edad = $_POST['edad'];
        $domicilio =$_POST['domicilio'];
        $telefono = $_POST['telefono'];
        $genero = $_POST['genero'];
        $correo = $_POST['correo'];

      $jugador->crear_jugador($dni,$nombre,$paterno,$materno,$nacimiento,$edad,$domicilio,$telefono,$genero,$correo);       
    }

    if($_POST['funcion'] == 'photo_crear'){
        $dni = $_POST['dni_tra'];
        if(($_FILES['photo']['type'] == 'image/jpeg') || ($_FILES['photo']['type'] == 'application/pdf')  || ($_FILES['photo']['type'] == 'image/png') || ($_FILES['photo']['type'] == 'image/jpg') || ($_FILES['photo']['type'] == 'image/gif'))
            {
                $foto = uniqid().'-'.$_FILES['photo']['name'];
                $ruta = '../assets/img/'.$foto;
                move_uploaded_file($_FILES['photo']['tmp_name'],$ruta);
                $jugador->cambiar_foto($dni,$foto);
                $json = array();
                $json[]=array(
                    'ruta'=>$ruta,
                    'alert'=>'edit'
                );
                $jsonstring =json_encode($json[0]);
                echo $jsonstring;
            }else{
                $json = array();
                $json[]=array(
                    'alert'=>'noedit'
                );
                $jsonstring =json_encode($json[0]);
                echo $jsonstring;
            }
    }

    if($_POST['funcion'] == 'editar_trabajador'){            
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $paterno = $_POST['paterno'];
        $materno = $_POST['materno'];
        $nacimiento = $_POST['nacimiento'];
        $edad = $_POST['edad'];
        $domicilio =$_POST['domicilio'];
        $telefono = $_POST['telefono'];
        $genero = $_POST['genero'];
        $correo = $_POST['correo'];


        $jugador->editar_trabajador($dni,$nombre,$paterno,$materno,$nacimiento,$edad,$domicilio,$telefono,$genero,$correo);
    }

    if($_POST['funcion'] == 'editar_photo'){
        $dni = $_POST['dni_tra'];
        if(($_FILES['photo']['type'] == 'image/jpeg') || ($_FILES['photo']['type'] == 'application/pdf')  || ($_FILES['photo']['type'] == 'image/png') || ($_FILES['photo']['type'] == 'image/jpg') || ($_FILES['photo']['type'] == 'image/gif'))
            {
                $foto = uniqid().'-'.$_FILES['photo']['name'];
                $ruta = '../assets/img/'.$foto;
                move_uploaded_file($_FILES['photo']['tmp_name'],$ruta);
                $jugador->editar_foto($dni,$foto);
                $json = array();
                $json[]=array(
                    'ruta'=>$ruta,
                    'alert'=>'edit'
                );
                $jsonstring =json_encode($json[0]);
                echo $jsonstring;
            }else{
                $json = array();
                $json[]=array(
                    'alert'=>'noedit'
                );
                $jsonstring =json_encode($json[0]);
                echo $jsonstring;
            }
    }
    //Perfil
    if($_POST['funcion'] == 'visualizar_jugador'){
        $id = $_POST['id'];
        $json = array();
        $jugador->ver_perfil($id);
        foreach($jugador->objetos as $objeto){
        if(!empty($objeto->ava_apo)){
            $nombres = $objeto->nom_apo.' '.$objeto->ape_pat_apo.' '.$objeto->ape_mat_apo;
            $json[] = array(
                'nombres'=>$nombres,
                'nacimiento'=>$objeto->nac_apo,
                'edad'=>$objeto->eda_apo,
                'dni'=>$objeto->dni_apo,
                'telefono'=>$objeto->tel_apo,
                'direccion'=>$objeto->dom_apo,
                'genero'=>$objeto->gen_apo,
                'avatar'=>$objeto->ava_apo,
                'correo'=>$objeto->cor_apo,);
        }else{
            $nombres = $objeto->nom_apo.' '.$objeto->ape_pat_apo.' '.$objeto->ape_mat_apo;
            $json[] = array(
                'nombres'=>$nombres,
                'nacimiento'=>$objeto->nac_apo,
                'edad'=>$objeto->eda_apo,
                'dni'=>$objeto->dni_apo,
                'telefono'=>$objeto->tel_apo,
                'direccion'=>$objeto->dom_apo,
                'genero'=>$objeto->gen_apo,
                'avatar'=>"default.jpg",
                'correo'=>$objeto->cor_apo,);
            }
        }
        echo json_encode($json[0]);
    }

    //Cantidad de personas

    if($_POST['funcion']== 'cantidad_personas'){
        $json = array();
        $jugador->cantidad_personas();
        foreach($jugador->objetos as $objeto){
            $json[] = array(
                'personas'=>$objeto->personas,
            );
        }
        echo json_encode($json[0]);
    }

    if($_POST['funcion']== 'cantidad_comprobantes'){
        $json = array();
        $jugador->cantidad_comprobantes();
        foreach($jugador->objetos as $objeto){
            $json[] = array(
                'comprobantes'=>$objeto->comprobantes,
            );
        }
        echo json_encode($json[0]);
    }


    if ($_POST['funcion']== 'editar_recibo') {  
        $id_emp=$_SESSION['usuario'];      
        $id_tra=$_POST['id_tra'];
        $ficha=$_POST['ficha'];
        $can_com=$_POST['can_com'];
        $ban_rec=$_POST['ban_rec'];
        $mon_re=$_POST['mon_re'];

        $jugador->recibo($id_emp,$id_tra,$ficha,$can_com,$ban_rec,$mon_re);    
    }

    if($_POST['funcion'] == 'buscar_historial_recibo'){
        $id = $_POST['id'];
        $json = array();
        $jugador->historial($id);
        if(empty($objeto->id_fic)){
            foreach($jugador->objetos as $objeto){
                $json[] = array(
                    'id_fic'=>$objeto->id_reg_rec,
                    'fechaH'=>$objeto->fec_reg,
                    'canalH'=>$objeto->can_cum_reg,
                    'bancoH'=>$objeto->ban_reg,
                    'ingresadoH'=>$objeto->monto_reg,
                    'aviso'=>'ver',
                );
                }
                echo json_encode($json);
        }else{
            $json[] = array(
                'aviso' => 'no-ver',
            );
            echo json_encode($json[0]);
            }
    }

    if($_POST['funcion'] == 'buscar_datos_editar'){
        $id = $_POST['id'];
        $jugador->buscar_datos_editar($id);
        $json = array();
        foreach($jugador->objetos as $objeto){
            $json[] = array(
                'id_rec'=>$objeto->id_reg_rec,
                'fecha_rec'=>$objeto->fec_reg,
                'can_com_rec'=>$objeto->can_cum_reg,
                'ban_rec'=>$objeto->ban_reg,
                'mon_ing_rec'=>$objeto->monto_reg,
            );
                
        }
        $jsonstring = json_encode($json[0]);
        echo $jsonstring;
    }
    if ($_POST['funcion']== 'editar_recibos') {      
        $id_fic_rec=$_POST['id'];
        $fecha=$_POST['fecha_rec'];
        $can_com=$_POST['can_com_rec'];
        $ban_rec=$_POST['ban_rec'];
        $mon_re=$_POST['mon_ing_rec'];

        $jugador->recibo_His($id_fic_rec,$fecha,$can_com,$ban_rec,$mon_re);    
    }

?>