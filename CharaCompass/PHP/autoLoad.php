<?php
function my_autoload ($pClassName) {
    
    // $mapa  = [];

    // $mapa['BatataDoce'] =  __DIR__ . "/app/especial/BatataDoce.class.php";

    // $mapa = [
    //     'BatataDoce' => __DIR__ . "/app/especial/BatataDoce.class.php",
    //     'BatataAAA' => __DIR__ . "/app/especial/BatataAAA.class.php",

    // ];

    // if(isset($mapa[$pClassName])){
    //     include_once $mapa[$pClassName];
    //     return ;
    // }

    $file = __DIR__ . "/" . $pClassName . ".class.php";
    if(file_exists($file)){
        include_once $file;
        return ;
    }
    
    $file = __DIR__ . "/" . $pClassName . ".trait.php";
    if(file_exists($file)){
        include_once $file;
        return ;
    }

}
spl_autoload_register("my_autoload");
?>