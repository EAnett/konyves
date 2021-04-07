<?php
switch ($menupont) {
    case "tartalom";
        require_once './tartalom.php';
        break;
    case "rendeles";
        require_once './rendeles.php';
        break;
    case "logout";
        require_once './logout.php';
        break;
    default:
        break;
}

