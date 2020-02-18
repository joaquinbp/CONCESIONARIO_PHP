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
 /*
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
        $result= $this->db->query($insert);
            if($result){
                header("Location: ../index.php?vista=busqueda&admin=1");
            } else{
                echo "Fallo al introducir";
            }
    }

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
        echo "<style>";
        echo "@media (min-width: 768px) {
            /* show 3 items */
            .carousel-inner .active,
            .carousel-inner .active + .carousel-item,
            .carousel-inner .active + .carousel-item + .carousel-item {
              display: block;
            }
          
            .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left),
            .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item,
            .carousel-inner .carousel-item.active:not(.carousel-item-right):not(.carousel-item-left) + .carousel-item + .carousel-item {
              transition: none;
            }
          
            .carousel-inner .carousel-item-next,
            .carousel-inner .carousel-item-prev {
              position: relative;
              transform: translate3d(0, 0, 0);
            }
          
            .carousel-inner .active.carousel-item + .carousel-item + .carousel-item + .carousel-item {
              position: absolute;
              top: 0;
              right: -33.3333%;
              z-index: -1;
              display: block;
              visibility: visible;
            }
          
            /* left or forward direction */
            .active.carousel-item-left + .carousel-item-next.carousel-item-left,
            .carousel-item-next.carousel-item-left + .carousel-item,
            .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item,
            .carousel-item-next.carousel-item-left + .carousel-item + .carousel-item + .carousel-item {
              position: relative;
              transform: translate3d(-100%, 0, 0);
              visibility: visible;
            }
          
            /* farthest right hidden item must be abso position for animations */
            .carousel-inner .carousel-item-prev.carousel-item-right {
              position: absolute;
              top: 0;
              left: 0;
              z-index: -1;
              display: block;
              visibility: visible;
            }
          
            /* right or prev direction */
            .active.carousel-item-right + .carousel-item-prev.carousel-item-right,
            .carousel-item-prev.carousel-item-right + .carousel-item,
            .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item,
            .carousel-item-prev.carousel-item-right + .carousel-item + .carousel-item + .carousel-item {
              position: relative;
              transform: translate3d(100%, 0, 0);
              visibility: visible;
              display: block;
              visibility: visible;
            }
          }
           ";
           echo "</style>";
        echo "</head>";
        echo "<body>";
        /*
        echo "<table class='table table-hover'>";
        echo "<thead>";
        echo "<tr class='bg-dark text-light'>";
        echo "<th scope='col'>Marca</th>";
        echo "<th scope='col'>Modelo</th>";
        echo "<th scope='col'>Año</th>";
        echo "<th scope='col'>Kms</th>";
        echo "<th scope='col'>Precio</th>";
        echo "<th scope='col'>Más información</th>";
        echo "</tr>";
        echo "</thead>";
        echo"<tbody>";
        foreach ($result as $res){
            $coches[] = $res;
        }
        if(count($coches)>0){
            for($i=0;$i<count($coches);$i++){
                echo "<tr>";
                echo "<th scope='row'>".$coches[$i]['marca']."</th>";
                echo "<td>".$coches[$i]['modelo']."</td>";
                echo "<td>".$coches[$i]['anio_matriculacion']."</td>";
                echo "<td>".$coches[$i]['kms']."</td>";
                echo "<td>".$coches[$i]['precio']."</td>";
                echo "<td><a href='views/update.php?id=".$coches[$i]['id']."'>Ver más</a></td>";
                echo "</tr>";
            }
        } else{
            echo "<tr><td colspan=6>No se han encontrado coches con estos parámetros de busqueda</td><tr>";
        }
        echo"</tbody>";
        
        echo "</table>";
        */
        echo"<div class='container-fluid'>
        <h1 class='text-center mb-3'>Bootstrap Multi-Card Carousel</h1>
        <div id='myCarousel' class='carousel slide' data-ride='carousel'>
          <div class='carousel-inner row w-100 mx-auto'>";
          foreach ($result as $res){
            $coches[] = $res;
          }
            if(count($coches)>0){
                for($i=0;$i<count($coches);$i++){
                   echo" <div class='carousel-item col-md-4 active'>
                   <div class='card'>
                     <img class='card-img-top img-fluid' src='http://placehold.it/800x600/f44242/fff' alt='Card image cap'>
                     <div class='card-body'>
                     <h4 class='card-title'>".$coches[$i]['marca']." ".$coches[$i]['modelo']."</h4>
                     <div class='row'>
                        <div class='col'>
                        <p>Marca: ".$coches[$i]['marca']."</p>
                        <p>Modelo: ".$coches[$i]['modelo']."</p>
                        <p>Color: ".$coches[$i]['color']."</p>
                        <p>Año de matriculación: ".$coches[$i]['anio_matriculacion']."</p>
                        <p>Motor: ".$coches[$i]['motor']."</p>
                        <p>Precio: ".$coches[$i]['precio']."</p>
                        <p>Kilometros: ".$coches[$i]['kms']."</p>
                        </div>
                        <div class='col'>
                        <p>Combustible: ".$coches[$i]['combustible']."</p>
                        <p>Puertas: ".$coches[$i]['num_puertas']."</p>
                        <p>Aire Acondicionado: ".$coches[$i]['Aire_Acondicionado']."</p>
                        <p>Elevalunas electrico: ".$coches[$i]['elevaluna']."</p>
                        <p>Remolque: ".$coches[$i]['remolque']."</p>
                        <p>Airbag: ".$coches[$i]['airbag']."</p>
                        <p>Navegador: ".$coches[$i]['navegador']."</p>
                        </div>
                     </div>
                     </div>
                   </div>
                 </div>";
                }
            } else{
                echo "<tr><td colspan=6>No se han encontrado coches con estos parámetros de busqueda</td><tr>";
            }
            echo " </div>
            </div>
          </div>
          <a class='carousel-control-prev' href='#myCarousel' role='button' data-slide='prev'>
            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
            <span class='sr-only'>Previous</span>
          </a>
          <a class='carousel-control-next' href='#myCarousel' role='button' data-slide='next'>
            <span class='carousel-control-next-icon' aria-hidden='true'></span>
            <span class='sr-only'>Next</span>
          </a>
        </div>
      </div>";
      echo "<script> $(document).ready(function() {
        $('#myCarousel').on('slide.bs.carousel', function(e) {
          var $e = $(e.relatedTarget);
          var idx = $e.index();
          var itemsPerSlide = 3;
          var totalItems = $('.carousel-item').length;
      
          if (idx >= totalItems - (itemsPerSlide - 1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i = 0; i < it; i++) {
              // append slides to end
              if (e.direction == 'left') {
                $('.carousel-item')
                  .eq(i)
                  .appendTo('.carousel-inner');
              } else {
                $('.carousel-item')
                  .eq(0)
                  .appendTo($(this).find('.carousel-inner'));
              }
            }
          }
        });
      });</script>";
      echo"</body>
      </html>";

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