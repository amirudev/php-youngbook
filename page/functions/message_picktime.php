<?php
function picktime($seconds){
    if($seconds < 60){
        return "$seconds detik yang lalu";
    } else if($seconds < 3600){
        $seconds = intval($seconds / 60);
        return "$seconds menit yang lalu";
    } else if($seconds < 86400){
        $seconds = intval($seconds / 3600);
        return "$seconds jam yang lalu";
    } else {
        $seconds = intval($seconds / 86400);
        return "$seconds hari yang lalu";
    }
}
?>