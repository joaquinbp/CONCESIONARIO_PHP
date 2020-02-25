<?php

class User{
    //Atributos
    private $db;
    private $personas;
    
    public function __construct(){
    
        $this->db=new PDO('mysql:host=localhost;dbname=Concesionario',"root","");
        $this->coches=array();
    }
   
    private function set_names(){
        return $this->db->query("SET NAMES 'utf8'");
    }

    //Funcion que elimina caracteres inadecuados
    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
      
      //Funcion de login
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

    //Funcion de registro de nuevos usuarios
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
    
    //Funcion de registro de nuevos coches
    public function register_Car($marca,$modelo,$color,$anio_matriculacion,$motor,$combustible,$num_puertas,$aire,$eleva,$remolque,$airbag,$navegador,$kms,$precio,$img,$img1){
        $insert = "INSERT INTO coches (marca,modelo,color,anio_matriculacion,motor,combustible,num_puertas,Aire_Acondicionado,elevaluna,remolque,airbag,navegador,kms,precio,foto,foto_1) values ('$marca','$modelo','$color','$anio_matriculacion','$motor','$combustible','$num_puertas',$aire,$eleva,$remolque,$airbag,$navegador,'$kms','$precio','$img','$img1');";
        $result= $this->db->query($insert);
            if($result){
                header("Location: ../index.php?vista=busqueda&admin=1");
            } else{
                echo "Fallo al introducir";
            }
    }

    //Funcion que busca coches y muestra los resultados, en funcion de una serie de parametros dados por el usuario
    public function search_Cars($consulta){
        self::set_names();
        $result = $this->db->query($consulta);
        $coches = [];
        echo"<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>";
        echo "<title>Document</title>";
        echo "</head>";
        echo "<body>";
        echo"<div class='container'>
        <h1 class='text-center display-4 py-5'>Resultados de la busqueda</h1>";
          foreach ($result as $res){
            $coches[] = $res;
          }
            if(count($coches)>0){
                for($i=0;$i<count($coches);$i++){
                   echo" <div class='row border py-4'>
                   <div class='col-3 mr-3'>
       
                     <img class='img-fluid zoom' src='../views/img_coches/".$coches[$i]['marca']."/".$coches[$i]['modelo']."/".$coches[$i]['foto']."' alt='Card image cap'>
                     <img class='img-fluid zoom' src='../views/img_coches/".$coches[$i]['marca']."/".$coches[$i]['modelo']."/".$coches[$i]['foto_1']."' alt='Card image cap'>
                     </div>
                     <div class='col-6 py-4'>
                     <div class='row'>
                     <div class='col-6'>
                        <p><b>Marca:</b> ".$coches[$i]['marca']."</p>
                        <p><b>Modelo:</b> ".$coches[$i]['modelo']."</p>
                        <p><b>Color:</b> ".$coches[$i]['color']."</p>
                        <p><b>Año de matriculación:</b> ".$coches[$i]['anio_matriculacion']."</p>
                        <p><b>Motor:</b> ".$coches[$i]['motor']."</p>
                        <p><b>Precio:</b> ".$coches[$i]['precio']."</p>
                        <p><b>Kilometros:</b> ".$coches[$i]['kms']."</p>
                        </div>
                        <div class='col-6'>
                        <p><b>Combustible:</b> ".$coches[$i]['combustible']."</p>
                        <p><b>Puertas:</b> ".$coches[$i]['num_puertas']."</p>
                        <p><b>Aire Acondicionado:</b> ".$coches[$i]['Aire_Acondicionado']."</p>
                        <p><b>Elevalunas electrico:</b> ".$coches[$i]['elevaluna']."</p>
                        <p><b>Remolque:</b> ".$coches[$i]['remolque']."</p>
                        <p><b>Airbag:</b> ".$coches[$i]['airbag']."</p>
                        <p><b>Navegador:</b> ".$coches[$i]['navegador']."</p>
                        </div>
                        </div>
                        </div>
                      </div>";
                }
            } else{
                echo "<tr><td colspan=6>No se han encontrado coches con estos parámetros de busqueda</td><tr><br>";
            }
            echo "<input type='button' onclick='history.back()' class='btn btn-primary my-3' name='volver atrás' value='volver atrás'>";
            echo " </div>";
            echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
            <script>
</script>";
      echo"</body>
      </html>";

    }
    }
?>