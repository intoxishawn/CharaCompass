<?php
function my_autoload ($pClassName) {

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

    $file = __DIR__ . "/Model/" . $pClassName . ".class.php";
    if(file_exists($file)){
        include_once $file;
        return ;
    }

    include_once __DIR__ . "/Model/Model.trait.php";

}
?>