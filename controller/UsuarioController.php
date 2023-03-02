<?php 
include_once '../model/Usuario.php';
session_start();
$id_usuario=$_SESSION['usuario'];
$usuario = new Usuario();

        if($_POST['funcion'] == 'buscar_usuario'){
            $json=array();
            $fecha_actual = new DateTime();
            $usuario->obtener_datos($_POST['dato']);
            foreach($usuario->objetos as $objeto){
                $nacimiento = new DateTime($objeto->fech_log);
                $edad = $nacimiento->diff($fecha_actual);
                $edad_years = $edad->y;
                $json[]=array(
                    'nombre'=>$objeto->nom_log,
                    'apellidos'=>$objeto->ape_log,
                    'edad'=>$edad_years,
                    'dni'=>$objeto->dni_log,
                    'telefono'=>$objeto->tel_log,
                    'tipo'=>$objeto->us_tip_log,
                    'direccion'=>$objeto->dir_log,
                    'correo'=>$objeto->cor_log,
                    'sexo'=>$objeto->sex_log,
                    'adicional'=>$objeto->ad_log,
                    'avatar'=>'../assets/img/'.$objeto->ava_log,
                );
            }
            $jsonstring = json_encode($json[0]);
            echo $jsonstring;
        }

        if($_POST['funcion'] == 'capturar_datos'){
            $json=array();
            $id_usuario=$_POST['id_usuario'];
            $usuario->obtener_datos($id_usuario);
            foreach($usuario->objetos as $objeto){
                $json[]=array(
                    'telefono'=>$objeto->telefono_login,
                    'tipo'=>$objeto->nombre_tipo,
                    'direccion'=>$objeto->direccion_login,
                    'correo'=>$objeto->correo_login,
                    'sexo'=>$objeto->sexo_login,
                    'adicional'=>$objeto->adicional_login,
                );
            }
            $jsonstring = json_encode($json[0]);
            echo $jsonstring;
        }

        if($_POST['funcion'] == 'editar_usuario'){
                
            $id_usuario=$_POST['id_usuario'];
            $telefono=$_POST['telefono'];
            $direccion=$_POST['direccion'];
            $correo=$_POST['correo'];
            $sexo=$_POST['sexo'];
            $adicional=$_POST['adicional'];
                
            $usuario->editar_datos($id_usuario,$telefono,$direccion,$correo,$sexo,$adicional);

            echo 'editado';
        }

        if($_POST['funcion'] == 'cambiar_pass'){
            $id_usuario=$_POST['id_usuario'];
            $oldpass=$_POST['oldpass'];
            $newpass=$_POST['newpass'];                
            $usuario->cambiar_pass($id_usuario,$oldpass,$newpass);
        } 

        if($_POST['funcion'] == 'cambiar_foto'){
            if(($_FILES['photo']['type'] == 'image/jpeg') || ($_FILES['photo']['type'] == 'application/pdf')  || ($_FILES['photo']['type'] == 'image/png') || ($_FILES['photo']['type'] == 'image/jpg') || ($_FILES['photo']['type'] == 'image/gif'))
            {
                $foto = uniqid().'-'.$_FILES['photo']['name'];
                $ruta = '../assets/img/'.$foto;
                move_uploaded_file($_FILES['photo']['tmp_name'],$ruta);
                $usuario->cambiar_foto($id_usuario,$foto);
                foreach($usuario->objetos as $objeto){
                    unlink('../assets/img/'.$objeto->avatar_login);
                }
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
        

        if($_POST['funcion'] == 'crear-usuario'){
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $edad  = $_POST['edad'];
            $dni = $_POST['dni'];
            $pass = $_POST['password'];
            $tipo = $_POST['tipo'];
            $avatar ='default.jpg';

            $usuario->crear_usuario($nombre,$apellidos,$edad,$dni,$pass,$tipo,$avatar);
        }

        if($_POST['funcion'] == 'editar'){
            $pass = $_POST['pass'];
            $id_editar= $_POST['id'];
            $tipo = $_POST['tipo'];
            
            $usuario->Editar($pass,$id_editar,$id_usuario,$tipo);

        }

        if($_POST['funcion'] == 'eliminar'){
            $pass = $_POST['pass'];
            $id_eliminar= $_POST['id'];
            
            $usuario->Borrar($pass,$id_eliminar,$id_usuario);

        }

        if($_POST['funcion'] == 'password'){
            $id=$_POST['id'];
            $id_admin = 1;
            $oldpass=$_POST['oldpass'];
            $newpass=$_POST['newpass'];                
            $usuario->password($id,$id_admin,$oldpass,$newpass);
        }
?>