<?php
session_start();

    if(isset($_GET['vista'])){
        switch($_GET['vista']){
            case 'principal' : require('./views/index.html');
            break;
            case 'login': require('./views/login.php');
            break;
            case 'registro':  require('./views/registro.php');
            break;
            case 'busqueda':
                if(isset($_GET['admin'])){
                    if($_GET['admin']==1){
                        require('./views/cabecera_admin.html');
                        require('./views/busqueda.html');
                        require('./views/footer.html');
                    } else{
                        require('./views/cabecera_user.html');
                        require('./views/busqueda.html');
                        require('./views/footer.html');
                    }
                }
            break;
            case 'registro_coche': 
                require('./views/cabecera_admin.html');
                require('./views/registro_coche.html');
                require('./views/footer.html');
            break;
        }
    } else{
        require('./views/index.html');
    }

?>