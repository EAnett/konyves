<?php  
    if(filter_input(INPUT_POST, "kosar", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
        //kiiratni a kosár tartalmát
        require_once './kosar.php';
    }
    else if(filter_input(INPUT_POST, "fizet", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)) {
        //kiiratni a kosár tartalmát
        require_once './kifizetes.php';
    }else {
        require_once './rendeles.php';
    }
?>

