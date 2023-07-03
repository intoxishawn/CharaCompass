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

}
?>