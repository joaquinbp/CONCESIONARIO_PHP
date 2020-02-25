<?php
session_start();
//Clase UserController que tiene como atributo un objeto User, y que en función de lo que el usuario que utiliza nuestra aplicación, utiliza el método correspondiente para cada acción.
class UserController{
    //Atributo
    private $users;

    //Métodos que utilizan los métodos que están definidos en la clase User
    public function __construct(){
        $this->users = new User();
    }
    
    public function login($user,$password){
        $this->users->login_User($user,$password);
    }

    public function register_user($nombre,$apellidos,$user,$password,$email,$telefono){
        $this->users->register_User($nombre,$apellidos,$user,$password,$email,$telefono);
    }

    public function register_car($marca,$modelo,$color,$anio_matriculacion,$motor,$combustible,$num_puertas,$aire,$eleva,$remolque,$airbag,$navegador,$kms,$precio,$img,$img1){
        $this->users->register_Car($marca,$modelo,$color,$anio_matriculacion,$motor,$combustible,$num_puertas,$aire,$eleva,$remolque,$airbag,$navegador,$kms,$precio,$img,$img1);
    }
    public function search_car($consulta){
        $this->users->search_Cars($consulta);
    }
}

    if(isset($_POST["Login"])){
        require_once("../models/user.php");
        $userController=new UserController();
        $user = $_POST["user"];
        $password = $_POST["password"];
        $userController->login($user,$password);
    } else{
        if(isset($_POST["Registrarme"])){
            require_once("../models/user.php");
            $userController=new UserController();
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $user = $_POST["user"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $telefono = $_POST["telefono"];
            $userController->register_user($nombre,$apellidos,$user,$password,$email,$telefono);
        } else{
            if(isset($_POST["InsertarCoche"])){
                require_once("../models/user.php");
                $userController=new UserController();
                $marca = $_POST["marca"];
                $modelo = $_POST["modelo"];
                $color = $_POST["color"];
                $anio_matriculacion = $_POST["anio_matriculacion"];
                $motor = $_POST["motor"];
                $precio = $_POST["precio"];
                $kms = $_POST["kms"];
                $combustible = $_POST["combustible"];
                $num_puertas = $_POST["puertas"];
                if(isset($_POST["aire"])){
                    $aire=1;
                    echo "el aire existe";
                } else{
                    $aire=0;
                }
                if(isset($_POST["eleva"])){
                    echo "el eleva existe";
                    $eleva=1;
                } else{
                    $eleva=0;
                }
                if(isset($_POST["remolque"])){
                    echo "el el remolque existe";
                    $remolque=1;
                } else{
                    $remolque=0;
                }
                if(isset($_POST["airbag"])){
                    echo "el airbag existe";
                    $airbag=1;
                } else{
                    $airbag=0;
                }
                if(isset($_POST["navegador"])){
                    echo "el nav existe";
                    $navegador=1;
                } else{
                    $navegador=0;
                }

                $img = $_POST["img"];
                $img1 = $_POST["img1"];
                echo $img;

                $userController->register_car($marca,$modelo,$color,$anio_matriculacion,$motor,$combustible,$num_puertas,$aire,$eleva,$remolque,$airbag,$navegador,$kms,$precio,$img,$img1);
        } else{
            if(isset($_POST["Buscar"])){
                require_once("../models/user.php");
                $userController=new UserController();
                $consulta = "SELECT * FROM coches WHERE ";
                $marca = $_POST["marca"];
                $consulta = $consulta." marca='".$marca."' and ";
                if(isset($_POST["modelo"]) && $_POST["modelo"] != ''){
                    $modelo = $_POST["modelo"];
                    $consulta = $consulta." modelo='".$modelo."' and ";
                }
                if(isset($_POST["color"]) && $_POST["color"] != ''){
                    $color = $_POST["color"];
                    $consulta = $consulta." color='".$color."' and ";
                }
                if(isset($_POST["anio_matriculacion"]) && $_POST["anio_matriculacion"] != ''){
                    $anio_matriculacion = $_POST["anio_matriculacion"];
                    $consulta = $consulta." anio_matriculacion='".$anio_matriculacion."' and ";
                } 
                if(isset($_POST["motor"]) && $_POST["motor"] != ''){
                    $motor = $_POST["motor"];
                    $consulta = $consulta." motor='".$motor."' and ";
                }
                if(isset($_POST["precio"]) && $_POST["precio"] != ''){
                    $precio = $_POST["precio"];
                    $consulta = $consulta." precio='".$precio."' and ";
                } 
                if(isset($_POST["kms"]) && $_POST["kms"] != ''){
                    $kms = $_POST["kms"];
                    $consulta = $consulta." kms='".$kms."' and ";
                }
                if(isset($_POST["combustible"])){
                    $combustible = $_POST["combustible"];
                    $consulta = $consulta." combustible='".$combustible."' and ";
                } 
                if(isset($_POST["puertas"])){
                    $puertas = $_POST["puertas"];
                    $consulta = $consulta." num_puertas='".$puertas."' and ";
                } 
                if(isset($_POST["aire"])){
                    $aire=1;
                    $consulta = $consulta." Aire_Acondicionado='".$aire."' and ";
                } 
                if(isset($_POST["eleva"])){
                    $eleva=1;
                    $consulta = $consulta." elevaluna='".$eleva."' and ";
                }
                if(isset($_POST["remolque"])){
                    $remolque=1;
                    $consulta = $consulta." remolque='".$remolque."' and ";
                }
                if(isset($_POST["airbag"])){
                    $airbag=1;
                    $consulta = $consulta." airbag='".$airbag."' and ";
                } 
                if(isset($_POST["navegador"])){
                    $navegador=1;
                    $consulta = $consulta." navegador='".$navegador."' and ";
                } 
                $pos = strrpos($consulta,'and');
                $consulta = substr_replace($consulta, ';', $pos);
                $userController->search_car($consulta);

            }
        }
    }
    
    }

?>