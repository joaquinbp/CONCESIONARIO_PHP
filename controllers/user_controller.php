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
    public function show_Users(){
        $this->users->show_Users();
    }
    public function update($id,$alias,$nombre,$email){
        $this->users->update_User($id,$alias,$nombre,$email);
    }

    public function insert($alias,$nombre,$email){
        $this->users->insert_User($alias,$nombre,$email);
    }

    public function delete($id){
        $this->users->delete_User($id);
    }
    
    public function login($user,$password){
        $this->users->login_User($user,$password);
    }
    public function register($nombre,$apellidos,$user,$password,$email,$telefono){
        $this->users->register_User($nombre,$apellidos,$user,$password,$email,$telefono);
    }
}

/*
if(isset($_POST["update"])){
    require_once("../models/user.php");
    $userController=new UserController();
    $id=$_GET["id"];
    $alias = $_POST["alias"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $userController->update($id,$alias,$nombre,$email);
    header('Location: ../index.php');
} else{
    if(isset($_POST["insert"])){
        require_once("../models/user.php");
        $userController=new UserController();
        $alias = $_POST["alias"];
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $userController->insert($alias,$nombre,$email);
        header('Location: ../index.php');
    } else{
            if(isset($_POST["delete"])){
            require_once("../models/user.php");
            $userController=new UserController();
            $id=$_GET["id"];
            $eliminar = $_POST["eliminar"];
            if($eliminar=="si"){
                $userController->delete($id);
            }
            header('Location: ../index.php');
        }
    }
}*/
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
            $userController->register($nombre,$apellidos,$user,$password,$email,$telefono);
        } else{
            if(isset($_POST["InsertarCoche"])){
                require_once("../models/user.php");
                $userController=new UserController();
                $marca = $_POST["marca"];
                $modelo = $_POST["modelo"];
                $color = $_POST["color"];
                $password = $_POST["password"];
                $email = $_POST["email"];
                $telefono = $_POST["telefono"];
                $userController->register($nombre,$apellidos,$user,$password,$email,$telefono);
        }
    }
    
    }

?>