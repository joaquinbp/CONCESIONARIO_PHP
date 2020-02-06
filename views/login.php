
<!doctype html>
<html lang="en">
  <head>
    <title>Car Bono</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="./views/css/style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      .slider {
        background: url("./views/img/1190.jpg");
        height: 380px;
        background-size: cover;
      }
    
      .footer {
        background: url("./views/img/pizarra.jpg");
        
      }
      .navbar{
        background-color: rgb(17, 16, 16);
      }





a {
  color: #92badd;
  display:inline-block;
  text-decoration: none;
  font-weight: 400;
}

h2 {
  text-align: center;
  font-size: 16px;
  font-weight: 600;
  text-transform: uppercase;
  display:inline-block;
  margin: 40px 8px 10px 8px; 
  color: #cccccc;
}



/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column; 
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}

#formContent {
  -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: relative;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;
}

#formFooter {
  background-color: #f6f6f6;
  border-top: 1px solid #dce8f1;
  padding: 25px;
  text-align: center;
  -webkit-border-radius: 0 0 10px 10px;
  border-radius: 0 0 10px 10px;
}



/* TABS */

h2.inactive {
  color: #cccccc;
}

h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #5fbae9;
}



/* FORM TYPOGRAPHY*/

input[type=button], input[type=submit], input[type=reset]  {
  background-color: #56baed;
  border: none;
  color: white;
  padding: 15px 80px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  text-transform: uppercase;
  font-size: 13px;
  -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
  margin: 5px 20px 40px 20px;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
  transition: all 0.3s ease-in-out;
}

input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
  background-color: #39ace7;
}

input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
  -moz-transform: scale(0.95);
  -webkit-transform: scale(0.95);
  -o-transform: scale(0.95);
  -ms-transform: scale(0.95);
  transform: scale(0.95);
}

input[type=text] {
  background-color: #f6f6f6;
  border: none;
  color: #0d0d0d;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 5px;
  width: 85%;
  border: 2px solid #f6f6f6;
  -webkit-transition: all 0.5s ease-in-out;
  -moz-transition: all 0.5s ease-in-out;
  -ms-transition: all 0.5s ease-in-out;
  -o-transition: all 0.5s ease-in-out;
  transition: all 0.5s ease-in-out;
  -webkit-border-radius: 5px 5px 5px 5px;
  border-radius: 5px 5px 5px 5px;
}

input[type=text]:focus {
  background-color: #fff;
  border-bottom: 2px solid #5fbae9;
}

input[type=text]:placeholder {
  color: #cccccc;
}



/* ANIMATIONS */

/* Simple CSS3 Fade-in-down Animation */
.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}


/* OTHERS */

*:focus {
    outline: none;
} 

#icon {
  width:50%;
}

    </style>
  </head>
  <body>
      <header>
      <div class="container-fluid">
          <div class="row cabecera">
              <div class="col-4 justify-content-left">
                  <img src="./views/img/logo1.PNG" height="150px">
              </div>
          </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
              <ul class="navbar-nav py-2">
                <li class="nav-item active pr-5">
                  <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item pr-5">
                  <a class="nav-link" href="#">Sobre nosotros</a>
                </li>
                <li class="nav-item pr-5">
                  <a class="nav-link" href="#" >Buscar</a>
                </li>
                <li class="nav-item pr-5">
                  <a class="nav-link" href="#">Instalaciones</a>
                </li>
                <li class="nav-item pr-5">
                    <a class="nav-link" href="#">Contacto</a>
                  </li>
                <li class="nav-item active pr-5 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="index.php?vista=0">Cerrar sesion</a>
                    </div>
                </li>
              </ul>
            </div>
          </nav>
      </header>

      <div class="container-fluid text-center slider text-black py-5">
          <h3>¿Estás buscando un coche nuevo?</h3>
          <h1 class="display-4">Solicita información sin compromiso</h1>

          <form class="form-inline d-flex justify-content-center">
            <div class="form-group mx-sm-3 mb-2">
              <label for="inputPassword2" class="sr-only">Password</label>
              <input type="password" class="form-control" id="inputPassword2" placeholder="Escribe tu email...">
            </div>
            <button type="submit" class="btn btn-primary mb-2 bg-danger">Enviar</button>
          </form>
      </div>

      <div class="container justify-content-center py-5">
        <div class="wrapper fadeInDown">
            <div id="formContent">
              <!-- Tabs Titles -->
          
              <!-- Icon -->
              <div class="fadeIn first">
                <img src="./views/img/logo1.PNG" id="icon" alt="User Icon" />
              </div>
          
              <!-- Login Form -->
              <form action="./controllers/user_controller.php" method="POST">
                <input type="text" id="user" class="fadeIn second" name="user" placeholder="username">
                <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
                <p style="color:red;">
                  <?php
                 
                  if(isset($_SESSION['mensaje'])){
                      echo $_SESSION['mensaje'];
                  }
                  unset($_SESSION['mensaje'])
                  ?>
              </p>
                <input type="submit" class="fadeIn fourth" value="Login" name="Login">
              </form>
          
              <!-- Remind Passowrd -->
          
            </div>
          </div>
      </div>
      <footer class=" footer container-fluid text-center text-white"> 
        <div class="row pt-2">
          <div class="col-lg-4 col-sm-12">
            <h4>¿Qué hacemos?</h4>
            <ul class="list-unstyled pt-3">
              <li>Información detallada</li>
              <li>Seguimiento de jovenes promesas</li>
              <li>Análisis de los equipos</li>
            </ul>
          </div>
          <div class="col-lg-4 col-sm-12">
            <h4>Redes sociales</h4>
            <div class="row pt-3">
              <div class="col-12">
                <i class="fab fa-twitter-square fa-2x pr-4"></i>
                <i class="fab fa-instagram fa-2x pr-4"></i>
                <i class="fab fa-facebook-square fa-2x pr-4"></i>
                <i class="fab fa-linkedin fa-2x pr-4"></i>
              </div>
            </div>
            
          </div>
          <div class="col-lg-4 col-sm-12">
            <h4>¿Quienes somos?</h4>
            <ul class="list-unstyled pt-3">
              <li>Joaquín Bono Pineda</li>
              <li>joaquinbono.18@campuscamara.es</li>
              <li>Alcalá de Guadaira, Sevilla</li>
            </ul>
          </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2020 Copyright: Joaquín Bono
        </div>
      </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/e13faebda0.js" crossorigin="anonymous"></script>
  </body>
</html>