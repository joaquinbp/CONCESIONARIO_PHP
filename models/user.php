<?php

class User{
    //Atributos
    private $db;
    private $personas;
    
    public function __construct(){
    
        $this->db=new PDO('mysql:host=localhost;dbname=Concesionario',"root","");
        $this->personas=array();
    }
    /*
    private function set_names(){
        return $this->db->query("SET NAMES 'utf8'");
    }

    Obtiene los usuarios que existen en la BBDD
    public function get_Users(){
    self::set_names();
    $consulta=$this->db->query("select * from usuarios;");
    foreach($consulta as $res)
    {
        $this->personas[]=$res;
    }
    return $this->personas;
    }
*/

    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      
    public function login_User($user,$password){
        
        $user = $this->test_input($user);
        $password = $this->test_input($password);
       

        $consulta = "SELECT * FROM usuarios WHERE usuario = '$user';";
        $res= $this->db->query($consulta);
        $numUsers = $res->rowCount();
        
        if($res){
            if($numUsers == 1){
                $users = array();
                $users = $res->fetch(PDO::FETCH_ASSOC);
                if($users['password']==$password){
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user; 
                    if($user == 'joaquinbp'){
                        header("Location: ../index.php?vista=busqueda&admin=1");
                    } else{
                        header("Location: ../index.php?vista=busqueda&admin=0");
                    }
                    
                }  else{
                    $_SESSION['mensaje'] = "Contraseña incorrecta"; 
                    header("Location: ../index.php?vista=login");
                }
               
            } else{
                $_SESSION['mensaje'] = "Usuario incorrecto";
                header("Location: ../index.php?vista=login");
            }
        }   
    }

    public function register_User($nombre,$apellidos,$user,$password,$email,$telefono){
        $nombre = $this->test_input($nombre);
        $apellidos = $this->test_input($apellidos);
        $user = $this->test_input($user);
        $password = $this->test_input($password); 
        $email = $this->test_input($email);
        $telefono = $this->test_input($telefono);
        $consulta = "SELECT * FROM usuarios WHERE usuario = '$user';";
        $res= $this->db->query($consulta);
        $numUsers = $res->rowCount();

            if($numUsers == 1){
                $users = array();
                $users = $res->fetch(PDO::FETCH_ASSOC);
                $_SESSION['mensaje'] = "Usuario incorrecto, el usuario ya existe";
                header("Location: ../index.php?vista=registro&hola=1");
        } else{
            $insert = "INSERT INTO usuarios (nombre,apellidos,usuario,password,email,telefono) values ('$nombre','$apellidos','$user','$password','$email','$telefono');";
            $result= $this->db->query($insert);
            if($result){
                header("Location: ../index.php?vista=busqueda&admin=0");
            }
            
    
        }    
    } 
    
    public function register_Car($marca,$modelo,$color,$anio_matriculacion,$motor,$combustible,$num_puertas,$aire,$eleva,$remolque,$airbag,$navegador,$kms,$precio,$img,$img1){
        $insert = "INSERT INTO coches (marca,modelo,color,anio_matriculacion,motor,combustible,num_puertas,Aire_Acondicionado,elevaluna,remolque,airbag,navegador,kms,precio,foto,foto_1) values ('$marca','$modelo','$color','$anio_matriculacion','$motor','$combustible','$num_puertas',$aire,$eleva,$remolque,$airbag,$navegador,'$kms','$precio','$img','$img1');";
        echo $insert;
        $result= $this->db->query($insert);
            if($result){
                
                //header("Location: ../index.php?vista=busqueda&admin=1");
            } else{
                echo "Fallo al introducir";
            }
    }

    
    }
/*
    //Funcion que muestra los usuarios
    public function show_Users(){
        $usuarios=self::get_Users();
        echo "<table border=2>";
        echo "<tr>";
        echo "<th>Id</th>";
        echo "<th>Alias</th>";
        echo "<th>Nombre</th>";
        echo "<th>Email</th>";
        echo "<th colspan=2>Acciones</th>";
        echo "</tr>";
        
        for($i=0;$i<count($usuarios);$i++){
            echo "<tr>";
            echo "<td>".$usuarios[$i]['id']."</td>";
            echo "<td>".$usuarios[$i]['alias']."</td>";
            echo "<td>".$usuarios[$i]['nombres']."</td>";
            echo "<td>".$usuarios[$i]['email']."</td>";
            echo "<td><a href='views/update.php?id=".$usuarios[$i]['id']."'>Actualizar</a></td><td><a href='views/delete.php?id=".$usuarios[$i]['id']."'>Eliminar</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    //Función que actualiza un usuario de la base de datos
    public function update_User($id,$alias, $nombre, $email){
        $alias=trim($alias);
        $nombre=trim($nombre);
        $email=trim($email);
       if($alias!=""){
        $update="UPDATE personas SET alias='$alias' WHERE id='$id'";
        $this->db->query($update);
       }
       if($nombre!=""){
        $update="UPDATE personas SET nombres='$nombre' WHERE id='$id'";
        $this->db->query($update);
       }
       if($email!=""){
        $update="UPDATE personas SET email='$email' WHERE id='$id'";
        $this->db->query($update);
       }

    }
    //Función que inserta un nuevo usuario en la base de datos
    public function insert_User($alias,$nombre,$email){
        $insert="INSERT INTO personas(alias, nombres, email) VALUES ('$alias', '$nombre','$email')";
        $this->db->query($insert);
    }

    //Función que borra un usuario de la base de datos
    public function delete_User($id){
        $delete="DELETE FROM personas WHERE id='$id'";
        $this->db->query($delete);
    }

}
*/
?>