<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = test_input($_POST['user']);
    $password = test_input($_POST['password']);
} else{
    $user = test_input($_GET['user']);
    $password = test_input($_GET['password']);
}

$db =new PDO('mysql:host=localhost;dbname=acceso',"root","");
$consulta = "SELECT * FROM usuarios WHERE user = '$user';";
$res= $db->query($consulta);
$numUsers = $res->rowCount();


if($res){
    if($numUsers == 1){
        $users = array();
        $users = $res->fetch(PDO::FETCH_ASSOC);
        if($users['password']==$password){
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user; 
            header("Location:  ../views/busqueda.html");
        }  else{
            $_SESSION['mensaje'] = "Contraseña incorrecta"; 
            header("Location: ../index.php?vista=1");
        }
       
    } else{
        $_SESSION['mensaje'] = "Usuario incorrecto";
        header("Location:  ../index.php?vista=1");
    }
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>