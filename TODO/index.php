<?php
    ini_set('display_errors','On');
   

    require __DIR__.'/vendor/autoload.php';
    
    use App\App;
    
    $conf=App::init();
    //constants d'enrutament i BBDD
    define('BASE',$conf['web']);
    define('ROOT',$conf['root']);
    define('DSN',$conf['driver'].':host='.$conf['dbhost'].';dbname='.$conf['dbname']);
    define('USR',$conf['dbuser']);
    define('PWD',$conf['dbpass']);

    App::run();


/*"conf_pro":{       
        "driver":"mysql",
        "dbhost":"db5001159986.hosting-data.io",
        "dbname":"dbs990971",
        "dbuser":"dbu726587",
        "dbpass":"#Hola123",       
        "web":"/M7/TODO/",
        "root":"/M7/TODO/"
    } */