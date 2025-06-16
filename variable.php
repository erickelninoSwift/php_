<?php

// learning about variables;

$name = (int) "100";
$surname = "Jackpot";

var_dump( $name );

$isDonwloading = (bool) "true";

if($isDonwloading){
    echo "The file is currently downloading";
}else {
    echo "make sure you have started the download";
};