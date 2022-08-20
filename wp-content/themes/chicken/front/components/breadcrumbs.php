<?php
if(!empty($args['sep'])){
    $sep = $args['sep'];
}else{
    $sep = ' » ';
}
if(!empty($args['loc'])){
    $loc = $args['loc'];
}else{
    $loc = [];
}
if(!empty($args['params'])){
    $p = $args['params'];
}else{
    $p = [];
}
    if (function_exists('kama_breadcrumbs')) kama_breadcrumbs($sep, $loc, $p);
?>