<?php
include_once 'Conexion.php';
class Usuario
{
    var $objetos;
    public function __construct()
    {
        $db = new Conexion();
        $this->acceso = $db ->pdo;
    }

    function loguearse($dni,$pass){
        $sql = "SELECT * FROM promotores WHERE dni_log=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni));
        $objetos=$query->fetchAll();
        if(!empty($objetos)){
           foreach ($objetos as $objeto){
                $password = $objeto->con_log;
            }
            if(strpos($password,'$2y$10$')===0){
                echo $password;
                if(password_verify($pass,$password)){
                    return "logueado";
                }
            }else{
                if($pass == $password){
                    return "logueado"  ;
                   }
            }
        }
    }

    function obtener_datos_logueo($dni){
        $sql = "SELECT * FROM promotores WHERE dni_log=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function obtener_datos_usuario($dni){
        $sql = "SELECT * FROM promotores WHERE dni_log=:dni=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }

    function obtener_datos($id){
        $sql = "SELECT * FROM promotores WHERE id_pro=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id));
        $this->objetos=$query->fetchAll();
        return $this->objetos;
    }

    function editar_datos($id_usuario,$telefono,$direccion,$correo,$sexo,$adicional){
        $sql = "UPDATE login SET tel_log=:telefono,dir_log=:direccion, cor_log=:correo, sex_log=:sexo,ad_log=:adicional WHERE id_login=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,':grado'=>$grado,':telefono'=>$telefono,':direccion'=>$direccion,':correo'=>$correo,':sexo'=>$sexo,':adicional'=>$adicional));
    }

    function cambiar_pass($id_usuario,$oldpass,$newpass){
        $sql = "SELECT * from promotores Where id_pro=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario));
        $this->objetos = $query->fetchAll();
        foreach ($this->objetos as $objeto){
            $password = $objeto->con_log;
        }

        if(strpos($password,'$2y$10$')===0){
            if(password_verify($oldpass,$password)){
                $encriptado = password_hash($newpass,PASSWORD_BCRYPT,['cost'=>10]);
                $sql = "UPDATE promotores SET con_log=:newpass where id_pro=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_usuario,':newpass'=>$encriptado));
                echo 'update';
            }else{
                echo 'noupdate';
            }

        }else{
            if($oldpass == $password){
                $encriptado = password_hash($newpass,PASSWORD_BCRYPT,['cost'=>10]);
                $sql = "UPDATE promotores SET con_log=:newpass where id_pro=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_usuario,':newpass'=>$encriptado));
                echo 'update';
            }else{
                echo 'noupdate';
            }
        }
    }

    function cambiar_foto($id_usuario,$foto){
        $sql = "SELECT * from promotores Where id_pro=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario,));
        $this->objetos = $query->fetchAll();
        if(!empty($this->objetos)){
            $sql = "UPDATE promotores SET ava_log=:foto where id_pro=:id";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':id'=>$id_usuario,':foto'=>$foto));
            return $this->objetos;
        }else{
            echo 'noupdate';
        }
    }

    function crear_usuario($nombre,$apellidos,$edad,$dni,$pass,$tipo,$avatar){
        $sql = "SELECT id_pro FROM promotores WHERE id_pro=:dni";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni'=>$dni));
        $this->objetos=$query->fetchAll();
        if(!empty($this->objetos)){
            echo 'no-add';
        }else{
            $encriptado = password_hash($pass,PASSWORD_BCRYPT,['cost'=>10]);
            $sql = "INSERT INTO promotores(nom_log,ape_log,fech_log,dni_log,con_log,ava_log,us_tip_log) VALUES (:nombre,:apellidos,:edad,:dni,:pass,:avatar,:tipo)";
            $query = $this->acceso->prepare($sql);
            $query->execute(array(':nombre'=>$nombre,':apellidos'=>$apellidos,':edad'=>$edad,':dni'=>$dni,':pass'=>$encriptado,':avatar'=>$avatar,':tipo'=>$tipo));
            echo 'add';
        }
    }

    function Editar($pass,$id_ascendido,$id_usuario,$tipo){
        $sql = "SELECT * FROM promotores WHERE id_pro=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario));
        $this->objetos=$query->fetchAll();
        foreach ($this->objetos as $objeto){
            $password = $objeto->con_log;
        }
        if(strpos($password,'$2y$10$')===0){
            if(password_verify($pass,$password)){
                $sql = "UPDATE promotores SET us_tip_log=:tipo WHERE id_pro=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_ascendido,':tipo'=>$tipo));
                echo 'editado';
            }else{
                echo 'noeditado';
            }

        }else{
            if($pass == $password){
                $sql = "UPDATE promotores SET us_tip_log=:tipo WHERE id_pro=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_ascendido,':tipo'=>$tipo));
                echo 'editado';
            }else{
                echo 'noeditado';
            }
        }
    }

    function Borrar($pass,$id_eliminar,$id_usuario){
        $sql = "SELECT * FROM promotores WHERE id_pro=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_usuario));
        $this->objetos=$query->fetchAll();
        foreach ($this->objetos as $objeto){
            $password = $objeto->con_log;
        }
        if(strpos($password,'$2y$10$')===0){
            if(password_verify($pass,$password)){
                $sql = "DELETE FROM promotores WHERE id_pro=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_eliminar));
                echo 'eliminado';
            }else{
                echo 'noeliminado';
            }

        }else{
            if($pass == $password){
                $sql = "DELETE FROM promotores WHERE id_pro=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id_eliminar));
                echo 'eliminado';
            }else{
                echo 'noeliminado';
            }
        }
    }

    function password($id,$id_admin,$oldpass,$newpass){
        $sql = "SELECT * from promotores Where id_pro=:id";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':id'=>$id_admin));
        $this->objetos = $query->fetchAll();
        foreach ($this->objetos as $objeto){
            $password = $objeto->con_log;
        }
        if(strpos($password,'$2y$10$')===0){
            if(password_verify($oldpass,$password)){
                $encriptado = password_hash($newpass,PASSWORD_BCRYPT,['cost'=>10]);
                $sql = "UPDATE promotores SET con_log=:newpass where id_pro=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id,':newpass'=>$encriptado));
                echo 'update';
            }else{
                echo 'noupdate';
            }

        }else{
            if($oldpass == $password){
                $encriptado = password_hash($newpass,PASSWORD_BCRYPT,['cost'=>10]);
                $sql = "UPDATE promotores SET con_log=:newpass where id_pro=:id";
                $query = $this->acceso->prepare($sql);
                $query->execute(array(':id'=>$id,':newpass'=>$encriptado));
                echo 'update';
            }else{
                echo 'noupdate';
            }
        } 
    }
}
?>
