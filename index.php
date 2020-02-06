<?php
session_start();

    if(isset($_GET['vista'])){
        switch($_GET['vista']){
            case 0 : require('./views/index.html');
            break;
            case 1: require('./views/login.php');
            break;
            case 2:  require('./views/registro.html');
            break;
            case 3:  require('./views/busqueda.html');
            break;
        }
    } else{
        require('./views/index.html');
    }

?>