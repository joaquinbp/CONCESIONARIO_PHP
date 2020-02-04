<?php

    if(isset($_GET['vista'])){
        switch($_GET['vista']){
            case 0 : require('./views/index.html');
            break;
            case 1: require('./views/login.html');
            break;
        }
    } else{
        require('./views/index.html');
    }

?>